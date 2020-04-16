<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kelas;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $primaryKey = 'nisn';
    protected $fillable = [
    	'nisn', 'nis', 'nama', 'id_kelas', 'alamat', 'no_telp', 'id_spp'
    ];

    public function kelas()
    {
    	return $this->belongsTo('App\Kelas', 'id_kelas');
    }

    public function spp()
    {
    	return $this->belongsTo('App\Spp', 'id_spp');
    }
}
