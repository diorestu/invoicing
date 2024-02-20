<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    public function index()
    {
        $data = Vendor::latest()->paginate();
        return view('vendor.index', compact('data'));
    }

    public function create()
    {
        $data = new Vendor;
        return view('vendor.create', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pt'   => 'required|string',
            'nama_bank' => 'required',
            'no_rek'    => 'required',
            'url_img'    => 'string',
        ]);

        $data = Vendor::create($data);
        return to_route('vendor.index')->withSuccess('Data succcessfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
