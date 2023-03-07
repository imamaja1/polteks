<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnalisisHypertensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisis_hypertensi', function (Blueprint $table) {
            $table->id();
            $table->string('usia');
            $table->string('IMT');
            $table->string('riwayat_keluarga_hypertensi');
            $table->string('riwayat_diri_hypertensi');
            $table->string('tingkat_stres');
            // Konsumsi asin/garam dan junk food 
            $table->string('konsumsi_makanan');
            $table->text('analisis'); 
            $table->text('penjelasan'); 
            $table->text('pencegahan');   
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
        Schema::dropIfExists('analisis_hypertensi');
    }
}
