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
            $table->unsignedInteger('id')->primary();
            $table->integer('jenis');
            $table->string('nomor', 100)->unique();
            $table->string('tentang');
            $table->string('dengan');
            $table->date('tanggal_produkhukum');
            $table->string('file_produkhukum');
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
