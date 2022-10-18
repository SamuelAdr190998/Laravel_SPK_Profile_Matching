<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_penilaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alternatif')->references('id')
                ->on('data_alternatif')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_aspek_penilaian')->references('id')
                ->on('aspek_penilaian')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_kriteria_penilaian')->references('id')
                ->on('kriteria_penilaian')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_subkriteria_penilaian')->references('id')
                ->on('subkriteria_penilaian')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('data_penilaian_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alternatif')->references('id')
                ->on('data_alternatif')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_aspek_penilaian')->references('id')
                ->on('aspek_penilaian')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_kriteria_penilaian')->references('id')
                ->on('kriteria_penilaian')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_subkriteria_penilaian')->references('id')
                ->on('subkriteria_penilaian')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('data_penilaian');
        Schema::dropIfExists('data_penilaian_user');
    }
}
