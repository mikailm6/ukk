<?php

use App\Kelas;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->bigIncrements('id_kelas');
            $table->string('nama_kelas');
            $table->string('kompetensi_keahlian');
            $table->timestamps();
        });

        Kelas::create([
            'nama_kelas' => 'XII RPL',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);

        Kelas::create([
            'nama_kelas' => 'XII TKJ',
            'kompetensi_keahlian' => 'Teknik Komputer Jaringan',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
