<?php

use App\Siswa;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->char('nisn', 10);
            $table->primary('nisn');
            $table->char('nis', 8);
            $table->string('nama', 35);
            $table->bigInteger('id_kelas')->unsigned();
            $table->text('alamat');
            $table->string('no_telp', 13);
            $table->bigInteger('id_spp')->unsigned();
            $table->timestamps();
        });

        Siswa::create([
            'nisn' => 12345678,
            'nis' => 12345,
            'nama' => 'Mikail Yuma Anri Malino',
            'id_kelas' => 1,
            'alamat' => 'Balikpapan Kalimantan Timur',
            'no_telp' => '081295133536',
            'id_spp' => 1,
        ]);

        Siswa::create([
            'nisn' => 23456789,
            'nis' => 23456,
            'nama' => 'Candra Rafi Widyatna',
            'id_kelas' => 2,
            'alamat' => 'Bekasi Jawa Barat',
            'no_telp' => '082893719208',
            'id_spp' => 2,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
