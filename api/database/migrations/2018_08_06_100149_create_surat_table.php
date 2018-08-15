<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->unsignedInteger('id_dokumen');
            $table->string('no_agenda');
            $table->string('no_surat');
            $table->string('kepada');
            $table->string('dari');
            $table->string('sifat');
            $table->string('disposisi');
            $table->date('tanggal_surat');
            $table->string('file_surat');
            $table->foreign('id_dokumen')->references('id_dokumen')->on('dokumen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat');
    }
}
