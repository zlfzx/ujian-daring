<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paket_soal_id');
            $table->unsignedBigInteger('rombel_id');
            $table->string('nama');
            $table->text('keterangan')->nullable();
            $table->dateTime('waktu_mulai');
            $table->integer('durasi');
            $table->decimal('bobot')->nullable();
            $table->decimal('poin_benar')->nullable();
            $table->decimal('poin_salah')->nullable();
            $table->decimal('poin_tidak_jawab')->nullable();
            $table->integer('tampil_hasil')->nullable();
            $table->integer('detail_hasil')->nullable();
            $table->string('token')->nullable();
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
        Schema::dropIfExists('ujian');
    }
}
