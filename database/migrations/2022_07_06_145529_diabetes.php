<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class diabetes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diabetes', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('usia');
            $table->string('riwayat_keluarga');
            $table->string('konsumsi_gula');
            $table->string('aktivitas');
            $table->string('kendali_makanan');
            $table->string('BB');
            $table->string('TB');
            $table->string('hypertensi');
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
        Schema::dropIfExists('diabetes');
    }
}
