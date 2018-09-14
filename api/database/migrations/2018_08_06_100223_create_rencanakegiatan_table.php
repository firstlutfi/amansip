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
            $table->increments('id_dokumen');
            $table->integer('jenis');
            $table->string('nama_kegiatan');
            $table->string('waktu_pelaksanaan');
            $table->date('tanggal_kegiatan');
            $table->string('jumlah_anggaran');
            $table->string('tujuan');
            $table->string('file_kegiatan');
            $table->string('created_by', 20);
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
        Schema::dropIfExists('rencanakegiatan');
    }
}
