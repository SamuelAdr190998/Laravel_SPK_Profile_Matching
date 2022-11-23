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
            $table->foreignId('id_alternatif')->constrained('data_alternatif', 'id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('id_kriteria')->constrained('data_kriteria', 'id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->longText('kode_sub_kriteria_array');
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
    }
}
