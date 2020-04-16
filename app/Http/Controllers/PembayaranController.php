<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\Petugas;
use Auth;
use PDF;
use App\Siswa;
use Illuminate\Http\Request;


class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts/pembayaran/cari');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $bayar = Pembayaran::where('nisn', $cari)->paginate();
        $total = Pembayaran::where('nisn', $cari)->sum(value('jumlah_bayar'));
        $siswa = Siswa::where('nisn', $cari)->get();

        return view('layouts/pembayaran/hasil', compact('bayar', 'siswa', 'total'));
    }

    public function generate()
    {
        $bayar = Pembayaran::all();
        $siswa = Siswa::all();

        return view('layouts/pembayaran/generate', compact('bayar', 'siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();

        return view('layouts/pembayaran/create', compact('siswa'));
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
            'id_petugas' => 'required',
            'nisn' => 'required',
            'tgl_bayar' => 'required',
            'bulan_bayar' => 'required',
            'tahun_bayar' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        $pet = Pembayaran::create([
            'id_petugas' => Auth::user()->id_petugas,
            'nisn' => $data['nisn'],
            'tgl_bayar' => $data['tgl_bayar'],
            'bulan_bayar' => $data['bulan_bayar'],
            'tahun_bayar' => $data['tahun_bayar'],
            'id_spp' => Siswa::where('nisn' , $data['nisn'] )->value('id_spp'),
            'jumlah_bayar' => $data['jumlah_bayar'],
        ]);

        return redirect()->back()->with(['success' => 'Berhasil Melakukan Transaksi']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }

}
