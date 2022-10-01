<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaPenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_penilaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_aspek_penilaian')->references('id')
            ->on('aspek_penilaian')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('kode_kriteria_penilaian');
            $table->string('nama_kriteria_penilaian');
            $table->double('bobot_kriteria_penilaian');
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
        Schema::dropIfExists('kriteria_penilaian');
    }
}
