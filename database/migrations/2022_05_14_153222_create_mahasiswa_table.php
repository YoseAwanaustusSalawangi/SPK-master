<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('nim_mhs')->nullable();
            $table->string('nama_mhs')->nullable();
            $table->text('cv') -> nullable();
            $table->text('transkrip_nilai') -> nullable();
            $table->text('sk') -> nullable();
            $table->text('foto') -> nullable();
            $table->text('status') -> nullable();
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
        Schema::dropIfExists('mahasiswa');
    }
}
