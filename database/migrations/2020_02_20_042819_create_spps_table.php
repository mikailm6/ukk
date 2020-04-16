<?php

use App\Spp;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spps', function (Blueprint $table) {
            $table->bigIncrements('id_spp');
            $table->string('tahun');
            $table->bigInteger('nominal')->unsigned();
            $table->timestamps();
        });

        Spp::create([
            'tahun' => '2020 - Semester 1',
            'nominal' => 1000000,
        ]);

        Spp::create([
            'tahun' => '2020 - Semester 2',
            'nominal' => 1500000,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spps');
    }
}
