<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Project;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Models\ContractHistory;
use App\Models\ContractAddendum;
use App\Models\ContractComponent;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{
    private $prefix = 'contract';

    public function history()
    {
        $data = ContractHistory::orderBy('id_contract', 'ASC')->latest()->take(30)->get();
        return view('contract.riwayat', compact('data'));
    }
    public function addendum($id)
    {
        $data   = Contract::findOrFail($id);
        $client = Project::latest()->get();
        return view($this->prefix . '.addendum', compact('data', 'client'));
    }

    public function addendumDetail($id)
    {
        $data = ContractAddendum::findOrFail($id);
        return view($this->prefix . '.addendum_detail', compact('data'));
    }

    public function addendumProcess(Request $request)
    {
        try {
            DB::beginTransaction();
            $input    = $request->all();
            $contract = Contract::findOrFail($input['id_contract']);
            $urut     = ContractAddendum::where('id_contract', $input['id_contract'])->max('no_add');
            $urutNext = ++$urut;
            Invoice::where('id_contract', $input['id_contract'])->where('status', 'pending')->delete();
            $contract->update($input);
            ContractAddendum::create([
                'id_project'       => $contract->id,
                'id_contract'      => $input['id_contract'],
                'no_kontrak_klien' => $input['no_kontrak_klien'],
                'no_add'           => $urutNext,
                'no_kontrak_asta'  => $contract->no_kontrak_asta . '-ADD' . $urutNext,
                'nama_pekerjaan'   => $input['nama_pekerjaan'],
                'tgl_addendum'     => $input['tgl_addendum'],
                'tgl_penagihan'    => $input['tgl_cutoff'],
                'lama_kontrak'     => $input['lama_kontrak'],
                'nominal_kontrak'  => $input['nominal_kontrak'],
                'inv_per_bulan'    => $input['nominal_kontrak'] / $input['lama_kontrak'],
                'jumlah_sdm'       => $input['jumlah_sdm'],
                'add_tipe'         => 'addendum',
                'tipe'             => $input['tipe'],
                'fee_management'   => $input['fee_management'],
                'term_of_payment'  => $input['term_of_payment'],
                // 'bpjs_kes'         => $input['bpjs_kes'],
                // 'bpjs_tk'          => $input['bpjs_tk'],
                'salary'           => $input['salary'],
                'ppn'              => $input['ppn'],
                'pph'              => $input['pph'],
                'status'           => 'pending',
            ]);
            ContractHistory::create([
                'id_contract' => $contract->id,
                'id_user' => auth()->id(),
                'keterangan' => 'Mengaddendum Kontrak pada ' . tanggalIndo(date('Y-m-d')),
            ]);
            addInvoiceAddendum($contract->id);
            DB::commit();
            return to_route($this->prefix . '.show', $contract->id)->withSuccess('Kontrak baru berhasil di-addendum');
        } catch (\Throwable $th) {
            return to_route($this->prefix . '.show', $contract->id)->withError('Gagal : ' . $th->getMessage());
        }
    }

    public function confirm(Request $request)
    {
        try {
            DB::beginTransaction();
            $r    = $request->all();
            $data = Contract::findOrFail($r['id_contract']);
            if ($r['btn'] == 'N') {
                $data->status = 'decline';
            } else {
                $nomor                     = buatNoUrut('ASTA', '2.2', 3);
                // dd($nomor);
                $data->no_kontrak_asta     = $nomor['urut'];
                $data->status              = 'accept';
                $addendum                  = ContractAddendum::where('id_contract', $r['id_contract'])->latest()->first();
                $addendum->no_add          = 0;
                $addendum->no_kontrak_asta = $nomor['urut'];
                $addendum->tgl_addendum    = $data->tgl_kontrak;
                $addendum->status          = 'accept';
                $addendum->save();
            }
            $data->save();
            addInvoice($data->id);
            ContractHistory::create([
                'id_contract' => $data->id,
                'id_user' => auth()->id(),
                'keterangan' => 'Menyetujui Kontrak pada ' . tanggalIndo(date('Y-m-d')),
            ]);
            DB::commit();
            return to_route($this->prefix . '.index')->withSuccess('Kontrak Telah Diperbaharui');
        } catch (\Throwable $th) {
            return to_route($this->prefix . '.index')->withError('Gagal : ' . $th->getMessage());
        }
    }

    public function index()
    {
        
        $data = Contract::where('tipe', '!=', 'pekerjaan')->latest()->get();
        $sum = Contract::where('tipe', '!=', 'pekerjaan')->sum('nominal_kontrak');
        $fee = Contract::where('tipe', '!=', 'pekerjaan')->sum('fee_management');
        $count = Contract::where('tipe', '!=', 'pekerjaan')->count('nominal_kontrak');
        return view($this->prefix . '.index', compact('data', 'count', 'sum', 'fee'));
    }

    public function indexPekerjaan()
    {
        $data = Contract::where('tipe', 'pekerjaan')->get();
        return view($this->prefix . '.index', compact('data'));
    }

    public function create()
    {
        if (Project::get() != []) {
            $data   = new Contract;
            $client = Project::orderBy('nama', 'asc')->latest()->get();
            // $noUrutAkhir = Contract::whereYear('created_at', date('Y'))->max('no_urut');
            return view($this->prefix . '.create', compact('data', 'client'));
        }
        return redirect()->back()->with('error', 'Klien Tidak Tersedia, Tambahkan Klien Terlebih Dahulu');
    }

    public function createPekerjaan()
    {
        $data   = new Contract;
        $client = Project::latest()->get();
        // $noUrutAkhir = Contract::whereYear('created_at', date('Y'))->max('no_urut');
        return view($this->prefix . '.create-pekerjaan', compact('data', 'client'));
    }

    public function store(Request $request)
    {
        // Cek Urutan Nomor
        $noUrutAkhir = Contract::whereYear('created_at', date('Y'))->max('no_urut');
        $no = 1;
        DB::beginTransaction();
        try {
            // Validasi Data
            $data = $request->validate([
                'id_project'       => 'required',
                'no_kontrak_klien' => '',
                'nama_pekerjaan'   => '',
                'tgl_kontrak'      => 'required',
                'tgl_cutoff'    => 'required',
                'lama_kontrak'     => 'required',
                'nominal_kontrak'  => 'required',
                'jumlah_sdm'       => '',
                'tipe'             => 'required',
                'fee_management'   => '',
                'term_of_payment'  => 'required',
                // 'bpjs_kes'         => '',
                // 'bpjs_tk'          => '',
                'salary'           => '',
                'ppn'              => '',
                'pph'              => '',
                'tipe'             => 'required',
                'status'           => '',
            ]);
            $data['status']        = "pending";
            $data['inv_per_bulan'] = $data['salary'] + $data['ppn'] + $data['fee_management'];
            $data['no_urut']       = $noUrutAkhir ? $noUrutAkhir + 1 : $no;
            // Buat Data Initial di Model Contract
            $res                   = Contract::create($data);
            // Buat Data Initial di Model ContractAddendum
            $data['no_add']        = 0;
            $data['add_tipe']      = 'initial';
            $data['tgl_addendum']  = $data['tgl_kontrak'];
            $data['id_contract']   = $res->id;
            ContractAddendum::create($data);
            ContractHistory::create([
                'id_contract' => $res->id,
                'id_user' => auth()->id(),
                'keterangan' => 'Menambahkan Kontrak Baru pada ' . $res->created_at,
            ]);
            DB::commit();
            return to_route($this->prefix . '.show', $res->id)->withSuccess('Kontrak baru berhasil ditambahkan');
        } catch (\Throwable $th) {
            return to_route($this->prefix . '.create')->withError('Gagal: ' . $th->getMessage());
        }
    }

    public function storePekerjaan(Request $request)
    {
        // Cek Urutan Nomor
        $input = $request->all();
        // dd($input);
        $noUrutAkhir = Contract::whereYear('created_at', date('Y'))->max('no_urut');
        $no = 1;
        try {
            DB::beginTransaction();
            // Validasi Data
            $data = $request->validate([
                'id_project'       => 'required',
                'no_kontrak_klien' => '',
                'nama_pekerjaan'   => '',
                'tgl_kontrak'      => 'required',
                'tgl_cutoff'       => 'required',
                'lama_kontrak'     => 'required',
                'nominal_kontrak'  => '',
                'jumlah_sdm'       => '',
                'tipe'             => 'string',
                'fee_management'   => '',
                'term_of_payment'  => 'required',
                'bpjs_kes'         => '',
                'bpjs_tk'          => '',
                'salary'           => '',
                'ppn'              => '',
                'pph'              => '',
            ]);
            $data['status']          = "pending";
            $data['nominal_kontrak'] = 0;
            $data['jumlah_sdm'] = 0;
            $data['inv_per_bulan']   = 0;
            $data['no_urut']         = $noUrutAkhir ? $noUrutAkhir + 1 : $no;
            $data['tipe']            = 'pekerjaan';
            // Buat Data Initial di Model Contract
            $res                     = Contract::create($data);
            // Buat Data Initial di Model ContractAddendum
            $data['no_add']          = 0;
            $data['add_tipe']        = 'initial';
            $data['tgl_addendum']    = $data['tgl_kontrak'];
            $data['id_contract']     = $res->id;

            ContractAddendum::create($data);
            for ($i = 0; $i < count($input['uraian']); $i++) {
                ContractComponent::create([
                    'id_contract' => $res->id,
                    'uraian'      => $input['uraian'][$i],
                    'harga'       => $input['harga'][$i],
                ]);
            }
            writeLog($res->id, 'Menambahkan Kontrak Baru');
            DB::commit();
            return to_route($this->prefix . '.show-pekerjaan', $res->id)->withSuccess('Kontrak baru berhasil ditambahkan');
        } catch (\Throwable $th) {
            return to_route($this->prefix . '.create-pekerjaan')->withError('Gagal: ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        $detail = ContractAddendum::where('id_contract', $contract->id)->get();
        return view($this->prefix . '.detail', compact('contract', 'detail'));
    }

    public function showPekerjaan(Contract $contract)
    {
        $comp = ContractComponent::where('id_contract', $contract->id)->latest()->get();
        $detail = ContractAddendum::where('id_contract', $contract->id)->get();
        return view($this->prefix . '.detail-pekerjaan', compact('contract', 'detail', 'comp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        $data = $contract;
        $client = Project::latest()->get();
        return view($this->prefix . '.edit', compact('data', 'client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        try {
            $data = $request->validate([
                'id_project'       => 'required',
                'no_kontrak_klien' => '',
                'nama_pekerjaan'   => '',
                'tgl_kontrak'      => 'required',
                'tgl_cutoff'       => 'required',
                'lama_kontrak'     => 'required',
                'nominal_kontrak'  => 'required',
                'jumlah_sdm'       => '',
                'tipe'             => 'required',
                'fee_management'   => '',
                'term_of_payment'  => 'required',
                // 'bpjs_kes'         => '',
                // 'bpjs_tk'          => '',
                'salary'           => '',
                'ppn'              => '',
                'pph'              => '',
                'tipe'             => 'required',
                'status'           => '',
            ]);
            // $data['status']        = "pending";
            $data['inv_per_bulan'] = $data['nominal_kontrak'] / $data['lama_kontrak'];
            // Buat Data Initial di Model Contract
            $contract->update($data);
            $addendum = ContractAddendum::where('id_contract', $contract->id)->first();
            ContractHistory::create([
                'id_contract' => $contract->id,
                'id_user' => auth()->id(),
                'keterangan' => 'Mengubah Data Kontrak pada ' . $contract->updated_at,
            ]);
            // Buat Data Initial di Model ContractAddendum
            $data['tgl_addendum']  = $data['tgl_kontrak'];
            $addendum->update($data);
            return to_route($this->prefix . '.index')->withSuccess('Data Berhasil Diperbaharui');
        } catch (\Throwable $th) {
            return redirect()->back()->withError('Gagal: ' . $th->getMessage());
        }
    }

    public function updatePekerjaan(Request $request, Contract $contract)
    {
        try {
            $data = $request->validate([
                'id_project'       => 'required',
                'no_kontrak_klien' => '',
                'nama_pekerjaan'   => '',
                'tgl_kontrak'      => 'required',
                'tgl_penagihan'    => 'required',
                'lama_kontrak'     => 'required',
                'nominal_kontrak'  => 'required',
                'jumlah_sdm'       => '',
                'tipe'             => 'required',
                'fee_management'   => '',
                'term_of_payment'  => 'required',
                // 'bpjs_kes'         => '',
                // 'bpjs_tk'          => '',
                'salary'           => '',
                'ppn'              => '',
                'pph'              => '',
                'tipe'             => 'required',
                'status'           => '',
            ]);
            // $data['status']        = "pending";
            $data['inv_per_bulan'] = $data['nominal_kontrak'] / $data['lama_kontrak'];
            // Buat Data Initial di Model Contract
            $contract->update($data);
            $addendum = ContractAddendum::where('id_contract', $contract->id)->first();
            ContractHistory::create([
                'id_contract' => $contract->id,
                'id_user' => auth()->id(),
                'keterangan' => 'Mengubah Data Kontrak pada ' . $contract->updated_at,
            ]);
            // Buat Data Initial di Model ContractAddendum
            $data['tgl_addendum']  = $data['tgl_kontrak'];
            $addendum->update($data);
            return to_route($this->prefix . '.index')->withSuccess('Data Berhasil Diperbaharui');
        } catch (\Throwable $th) {
            return to_route($this->prefix . '.index')->withError('Gagal: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Contract $contract)
    {
        // dd($contract);
        try {
            $contract->delete();
            Invoice::where('id_contract', $contract->id)->delete();
            return to_route($this->prefix . '.index')->withSuccess('Kontrak Telah Berhasil Dihapus!');
        } catch (\Throwable $th) {
            return to_route($this->prefix . '.index')->withError('Gagal: ' . $th->getMessage());
        }
    }
}
