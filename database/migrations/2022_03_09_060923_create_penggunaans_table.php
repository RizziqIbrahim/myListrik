<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggunaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pelanggan');
            $table->string('bulan');
            $table->integer('tahun');
            $table->integer('meter_awal');
            $table->integer('meter_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penggunaans');
    }
}
