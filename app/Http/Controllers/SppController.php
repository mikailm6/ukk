<?php

namespace App\Http\Controllers;

use App\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = Spp::all();

        return view('layouts/spp/index', compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tahun' => 'string|required|max:32',
            'nominal' => 'string|required',
        ]);

        $spp = Spp::create($data);

        return redirect()->back()->with(['success' => 'Data Berhasil Di Tambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function edit($id_spp)
    {
        $spp = Spp::findOrFail($id_spp);

        return view('layouts/spp/edit', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_spp)
    {
        $data = $request->validate([
            'tahun' => 'string|required|max:32',
            'nominal' => 'string|required',
        ]);

        $spp = Spp::findOrFail($id_spp);
        $spp->update($data);

        return redirect(route('spp.index'))->with(['success' => 'Data Berhasil Di Edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_spp)
    {
        $spp = Spp::findOrFail($id_spp);
        $spp->delete();

        return redirect()->back()->with(['success' => 'Data Berhasil Di Hapus']);
    }
}
