<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumenkegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumenkegiatan', function (Blueprint $table) {
            $table->unsignedInteger('id_dokumen')->primary();
            $table->integer('jenis');
            $table->string('nama_kegiatan');
            $table->string('lampiran');
            $table->string('nomor', 100)->unique();
            $table->string('tempat_kegiatan');
            $table->date('tanggal_kegiatan');
            $table->string('waktu_kegiatan');
            $table->string('pimpinan');
            $table->string('acara');
            $table->string('dasar');
            $table->string('isi');
            $table->string('file_kegiatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumenkegiatan');
    }
}
