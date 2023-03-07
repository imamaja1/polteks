<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hypertensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hypertensi', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('usia');
            $table->string('BB');
            $table->string('TB');
            $table->string('riwayat_keluarga_hypertensi');
            $table->string('riwayat_diri_hypertensi');
            $table->string('tingkat_stres');
            // Konsumsi asin/garam dan junk food 
            $table->string('konsumsi_makanan'); 
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
        Schema::dropIfExists('hypertensi');
    }
}
