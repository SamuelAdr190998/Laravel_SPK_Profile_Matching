<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAlternatifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_alternatif', function (Blueprint $table) {
            $table->id();
            $table->string('kode_alternatif');
            $table->string('nama_kos');
            $table->string('link_kos');
            $table->string('pemilik_kos');
            $table->string('jenis_kos');
            $table->text('alamat_kos');
            $table->string('whatsapp_kos');
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
        Schema::dropIfExists('data_alternatif');
    }
}
