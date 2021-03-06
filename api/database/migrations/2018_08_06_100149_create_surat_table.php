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
            $table->increments('id_dokumen');
            $table->integer('jenis');
            $table->integer('tipe_surat');
            $table->string('tentang');
            $table->string('nomor', 100)->unique();
            $table->string('kepada');
            $table->string('dari');
            $table->string('sifat');
            $table->string('disposisi');
            $table->string('isi_disposisi');
            $table->integer('klasifikasi');
            $table->string('lampiran');
            $table->string('perihal');
            $table->date('tanggal_surat');
            $table->string('file_surat');
            $table->string('created_by', 20)->nullable();
            $table->foreign('created_by')->references('nip')->on('users')->onDelete('cascade');
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
