<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    private $prefix = 'client';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = DB::table('projects')->selectRaw('kategori, COUNT(kategori) as count')->groupBy('kategori')->pluck('count', 'kategori')->toArray();
        $data = Project::latest()->get();
        return view($this->prefix . '.index', compact('data', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data   = new Project;
        $vendor = Vendor::all();
        return view($this->prefix . '.create', compact('data', 'vendor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nama'        => 'required|string',
                'kategori'    => 'required|string',
                'kode_faktur' => 'string',
                'pic'         => 'string',
                'telp'        => 'string|max:20',
                'deskripsi'   => 'string',
                'tembusan'    => 'string',
                'jabatan'     => 'string',
                'alamat'      => 'string|max:200',
                'alamat2'     => 'string|max:200',
                'logo'        => 'string',
                'tipe_client' => 'string',
                'vendor'      => 'string',
                'status'      => 'string',
                'provinsi'    => 'string'
            ]);
            $data['nama'] = strtoupper($request->nama);
            $data['status'] = 'y';
            Project::create($data);

            return to_route($this->prefix . '.index')->withSuccess('Klien baru berhasil ditambahkan');
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return to_route($this->prefix . '.index')->withError('Gagal: ' . $th->getMessage());
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
        //
    }

    /**
     * Show the form for editing the specified resource
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Project::findOrFail($id);
        $vendor = Vendor::all();
        return view($this->prefix . '.edit', compact('data', 'vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $client)
    {
        try {
            $data = $request->validate([
                'nama'        => 'required|string',
                'kategori'    => 'required|string',
                'kode_faktur' => 'string',
                'pic'         => 'string',
                'telp'        => 'string|max:20',
                'deskripsi'   => 'string',
                'tembusan'    => 'string',
                'jabatan'     => 'string',
                'alamat'      => 'string|max:200',
                'alamat2'     => 'string|max:200',
                'logo'        => 'string',
                'tipe_client' => 'string',
                'vendor'      => 'string',
                'status'      => 'string',
                'provinsi'    => 'string'
            ]);
            $data['nama'] = strtoupper($request->nama);
            // dd($data);
            $client->update($data);
            return to_route($this->prefix . '.index')->withSuccess('Data Klien Berhasil Diperbaharui.');
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
    public function delete(Project $client)
    {
        $client->delete();
        return to_route($this->prefix . '.index')->withSuccess('Klien telah dihapus.');
    }
}
