<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';

    protected $fillable = [
    	'id_petugas', 'nisn', 'tgl_bayar', 'bulan_bayar', 'tahun_bayar', 'id_spp', 'jumlah_bayar'
    ];

    public function petugas()
    {
    	return $this->belongsTo('App\Petugas', 'id_petugas');
    }

    public function siswa()
    {
    	return $this->belongsTo('App\Siswa', 'nisn');
    }
}
