<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnalisisDiabetes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisis_diabetes', function (Blueprint $table) {
            $table->id();
            $table->string('usia');
            $table->string('riwayat_keluarga');
            $table->string('konsumsi_gula');
            $table->string('kendali_makanan');
            $table->string('aktivitas');
            $table->string('imt');
            $table->string('hypertensi');
            $table->text('analisis');
            $table->text('penjelasan');
            $table->text('penaggulangan');
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
        Schema::dropIfExists('analisis_diabetes');
    }
}
