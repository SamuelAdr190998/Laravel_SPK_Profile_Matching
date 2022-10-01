<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubkriteriaPenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subkriteria_penilaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kriteria_penilaian')->references('id')
            ->on('kriteria_penilaian')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('kode_subkriteria_penilaian');
            $table->string('nama_subkriteria_penilaian');
            $table->double('bobot_subkriteria_penilaian');
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
        Schema::dropIfExists('subkriteria_penilaian');
    }
}
