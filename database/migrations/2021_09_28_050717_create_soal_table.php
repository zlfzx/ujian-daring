<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paket_soal_id');
            $table->enum('jenis', ['pilihan_ganda', 'essai']);
            $table->text('pertanyaan');
            $table->text('media')->nullable();
            $table->integer('ulang_media')->default(1)->comment('putar ulang media');
            $table->timestamps();

            $table->foreign('paket_soal_id')->on('paket_soal')->references('id')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soal');
    }
}
