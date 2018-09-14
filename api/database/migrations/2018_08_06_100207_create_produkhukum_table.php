<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukhukumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produkhukum', function (Blueprint $table) {
            $table->increments('id_dokumen');
            $table->integer('jenis');
            $table->string('nomor', 100)->unique();
            $table->string('tentang');
            $table->string('dengan');
            $table->date('tanggal_produkhukum');
            $table->string('file_produkhukum');
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
        Schema::dropIfExists('produkhukum');
    }
}
