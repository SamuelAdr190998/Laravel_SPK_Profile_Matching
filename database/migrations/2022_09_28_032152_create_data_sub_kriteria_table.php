<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSubKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_sub_kriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kriteria')->constrained('data_kriteria', 'id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('kode_sub_kriteria');
            $table->string('nama_sub_kriteria');
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
        Schema::dropIfExists('data_sub_kriteria');
    }
}
