<?php

namespace App\Http\Controllers;

use App\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pet = Petugas::where('level', '!=', 3)->get();
        $pet2 = Petugas::whereLevel(3)->get();

        return view('layouts/petugas/index', compact('pet', 'pet2'));
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
            'username' => 'string|required|max:32',
            'password' => 'required',
            'nama_petugas' => 'string|required',
            'level' => 'required',
        ]);

        $pet = Petugas::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'nama_petugas' => $data['nama_petugas'],
            'level' => $data['level'],
        ]);

        return redirect()->back()->with(['success' => 'Data Berhasil Di Tambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id_petugas)
    {
        $pet = Petugas::findOrFail($id_petugas);

        return view('layouts/petugas/edit', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_petugas)
    {
        $data = $request->validate([
            'username' => 'string|required|max:32',
            'password' => 'string|required',
            'nama_petugas' => 'string|required',
            'level' => 'string|required',
        ]);

        $pet = Petugas::findOrFail($id_petugas);
        $pet->update([
            'username' => $data['username'],
            'nama_petugas' => $data['nama_petugas'],
            'level' => $data['level'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect(route('petugas.index'))->with(['success' => 'Data Berhasil Di Edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_petugas)
    {
        $pet = Petugas::findOrFail($id_petugas);
        $pet->delete();

        return redirect()->back()->with(['success' => 'Data Berhasil Di Hapus']);
    }
}
