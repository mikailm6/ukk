<?php

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->bigIncrements('id_petugas');
            $table->string('username');
            $table->string('password');
            $table->string('nama_petugas');
            $table->string('level');
            $table->timestamps();
        });

        User::create([
            'username' => 'admin',
            'password' => Hash::make('12345678'),
            'nama_petugas' => 'Admin',
            'level' => 1,
        ]);

        User::create([
            'username' => 'petugas',
            'password' => Hash::make('12345678'),
            'nama_petugas' => 'Petugas',
            'level' => 2,
        ]);

        User::create([
            'username' => 'siswa',
            'password' => Hash::make('12345678'),
            'nama_petugas' => 'Siswa',
            'level' => 3,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugas');
    }
}
