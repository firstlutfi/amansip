<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRencanakegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencanakegiatan', function (Blueprint $table) {
            $table->unsignedInteger('id_dokumen')->primary();
            $table->integer('jenis');
            $table->string('nama_kegiatan');
            $table->string('waktu_pelaksanaan');
            $table->date('tanggal_kegiatan');
            $table->string('jumlah_anggaran');
            $table->string('tujuan');
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
        Schema::dropIfExists('rencanakegiatan');
    }
}
