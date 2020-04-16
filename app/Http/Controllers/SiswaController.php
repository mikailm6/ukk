<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Kelas;
use App\Spp;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $spp = Spp::all();

        return view('layouts/siswa/index',compact('siswa', 'kelas', 'spp'));
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
            'nisn' => 'required|max:16',
            'nis' => 'required|max:16',
            'nama' => 'string|required',
            'id_kelas' => 'required|max:16',
            'alamat' => 'required',
            'no_telp' => 'required|max:14',
            'id_spp' => 'required|max:16',
        ]);

        $siswa = Siswa::create($data);

        return redirect(route('siswa.index'))->with(['success' => 'Data Berhasil Di Tambah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($nisn)
    {
        $siswa = Siswa::findOrFail($nisn);
        $kelas = Kelas::get();
        $spp = Spp::get();

        return view('layouts/siswa/edit', compact('siswa', 'kelas', 'spp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nisn)
    {
        $data = $request->validate([
            'nisn' => 'required|max:16',
            'nis' => 'required|max:16',
            'nama' => 'string|required',
            'id_kelas' => 'required|max:16',
            'alamat' => 'required',
            'no_telp' => 'required|max:14',
            'id_spp' => 'required|max:16',
        ]);

        $siswa = Siswa::findOrFail($nisn);
        $siswa->update($data);

        return redirect(route('siswa.index'))->with(['success' => 'Data Berhasil Di Edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($nisn)
    {
        $siswa = Siswa::findOrFail($nisn);
        $siswa->delete();

        return redirect(route('siswa.index'))->with(['success' => 'Data Berhasil Di Hapus']);
    }
}
