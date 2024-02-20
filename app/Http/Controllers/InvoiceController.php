<?php

namespace App\Http\Controllers;

use App\Models\ContractComponent;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\ContractHistory;
use App\Models\InvoicePrint;
use App\Models\InvoicePrintDetail;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InvoiceController extends Controller
{
    private $prefix = 'invoice';

    // public function editInvoice(Request $r)
    // {
    //     // dd($component);
    //     try {
    //         $data      = Invoice::findOrFail($id);
    //         $detail = ContractComponent::where('id_contract', $data->id_contract)->get();
    //         return view($this->prefix . '.create', compact('data', 'detail'));
    //     } catch (\Throwable $th) {
    //         return to_route($this->prefix . '.index')->withError('Gagal : ' . $th->getMessage());
    //         // dd($id);
    //     }
    // }

    public function generateInv($id)
    {
        // dd($component);
        try {
            $data      = Invoice::findOrFail($id);
            $detail = ContractComponent::where('id_contract', $data->id_contract)->get();
            return view($this->prefix . '.create', compact('data', 'detail'));
        } catch (\Throwable $th) {
            return to_route($this->prefix . '.index')->withError('Gagal : ' . $th->getMessage());
            // dd($id);
        }
    }

    public function setOverdue($id)
    {
        try {
            DB::beginTransaction();
            $data = Invoice::findOrFail($id);
            ContractHistory::create([
                'id_contract' => $data->id_contract,
                'id_invoice'  => $data->id,
                'id_user'     => auth()->id(),
                'keterangan'  => 'Mengubah Status Invoice ' . tanggalIndo($data->period) . ' dari ' . $data->status . ' ke Overdue.',
            ]);
            $data->status = 'overdue';
            $data->save();
            DB::commit();
            // $msgWa = "_*INVOICING*_\n".
            // "__________________________________________\n".
            // "\n*Nama Klien*: *" . strtoupper($data->contract->project->nama) .
            // "*\nNama Pekerjaan: " . strtoupper($data->contract->nama_pekerjaan) .
            // "\nNo Invoice: " . $data->nomor_po .
            // "\nStatus: " . strtoupper($data->status).
            // "\nTotal Bayar: " . rupiah($data->nominal);
            // DB::commit();
            // wa_api("6285739940320", $msgWa);
            return to_route($this->prefix . '.index')->withSuccess('Invoice telah diperbaharui');
        } catch (\Throwable $th) {
            return to_route($this->prefix . '.index')->withError('Gagal : ' . $th->getMessage());
            // dd($id);
        }
    }

    public function ubahStatus(Request $r, $id)
    {
        try {
            DB::beginTransaction();
            $data = Invoice::findOrFail($id);
            $string = 'Mengubah Status Invoice periode ' . tanggalIndo($data->period) . ' dari ' . $data->status . ' ke ' . $r->status . '.';
            ContractHistory::create([
                'id_contract' => $data->id_contract,
                'id_invoice'  => $data->id,
                'id_user'     => auth()->id(),
                'keterangan'  => $string,
            ]);
            $data->status = $r->status;
            // -----------------------------------------
            if ($r->status == 'dibayar') {
                $data->paid_at = date('Y-m-d');
            }
            $data->save();
            // $msgWa = "_*INVOICING*_\n".
            // "__________________________________________\n".
            // "\n*Nama Klien*: *" . strtoupper($data->contract->project->nama) .
            // "*\nNama Pekerjaan: " . strtoupper($data->contract->nama_pekerjaan) .
            // "\nNo Invoice: " . $data->nomor_po .
            // "\nStatus: " . strtoupper($data->status).
            // "\nTotal Bayar: " . rupiah($data->nominal);
            DB::commit();
            // wa_api("6285739940320", $msgWa);
            return to_route($this->prefix . '.index')->withSuccess('Invoice telah diperbaharui');
        } catch (\Throwable $th) {
            return to_route($this->prefix . '.index')->withError('Gagal : ' . $th->getMessage());
            // dd($id);
        }
    }

    public function index()
    {
        $data        = Invoice::whereMonth('period', date('m'))->whereYear('period', date('Y'))->orderBy('period', 'ASC')->get();
        $dataOverdue = Invoice::whereMonth('period', date('m'))->whereYear('period', date('Y'))->orderBy('period', 'ASC')->where('status', 'overdue');
        $dataPaid    = Invoice::whereMonth('period', date('m'))->whereYear('period', date('Y'))->where('status', 'dibayar')->sum('nominal');
        return view($this->prefix . '.index', compact('data', 'dataOverdue', 'dataPaid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Invoice;
        return view($this->prefix . '.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $nomor = buatNoUrutInvoice();
            $data  = $request->validate([
                'id_invoice'     => 'required',
                'tgl_terbit_inv' => 'required',
                'period'         => 'required',
                'uraian'         => 'required',
                'qty'            => 'required',
            ]);
            // $data['grand_total'] = array_sum($data['subtotal']);
            $data['nomor_po']    = $nomor['urut'];
            $data['no_urut']     = ++$nomor['akhir'];
            // Ubah Status Inv Diterbitkan
            $inv = Invoice::findOrFail($request->id_invoice);
            $inv->status = "terbit";
            $inv->save();
            // Buat Inv Detail
            // $res = InvoicePrint::create($data);
            // for ($i = 0; $i < count($data['uraian']); $i++) {
            //     $uraian = ContractComponent::find($data['uraian'][$i]);
            //     InvoicePrintDetail::create([
            //         'id_invoice' => $res->id,
            //         'uraian'     => $uraian->uraian,
            //         'qty'        => $data['qty'][$i],
            //         'subtotal'   => $data['qty'][$i] * $uraian->harga
            //     ]);
            // }
            DB::commit();
            return to_route($this->prefix . '.index')->withSuccess('Klien baru berhasil ditambahkan');
        } catch (\Throwable $th) {
            return to_route($this->prefix . '.index')->withError('Gagal : ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $data       = Invoice::findOrFail($id);
            // dd($data);
            $dataRender = InvoicePrint::where('id_invoice', $id)->latest()->first();
            // if ($dataRender) {
            // }
            // return redirect()->back()->withError('Invoice Belum Tergenerate');
            return view($this->prefix . '.detail', compact('data', 'dataRender'));
        } catch (\Throwable $th) {
            return redirect()->back()->withError('Gagal: ' . $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view($this->prefix . '.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        // dd($request->all());
        DB::beginTransaction();
        $data = $request->all();

        $invoice->tgl_terbit        = $data['tgl_invoice'];
        $invoice->uraian            = $data['uraian'];
        $invoice->no_inv            = $data['no_inv'];
        $invoice->no_or             = $data['no_or'];
        $invoice->no_surat          = $data['no_surat'];
        if (request()->has('tampil_total_only')) {
            $invoice->tampil_total_only = true;
        } else {
            $invoice->tampil_total_only = false;
        }
        $invoice->save();
        DB::commit();
        // $invoice->update($request->all());

        return to_route($this->prefix . '.index')->withSuccess('Data succcessfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Invoice $invoice)
    {
        $invoice->delete();
        return to_route($this->prefix . '.index')->withSuccess('Invoice successfully deleted.');
    }
}
