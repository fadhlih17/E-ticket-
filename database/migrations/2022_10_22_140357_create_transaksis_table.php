<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('noId')->nullable();
            $table->string('telp')->nullable();
            $table->string('id_wisata')->nullable();
            $table->date('tgl_kunjungan')->nullable();
            $table->integer('jumlah_dewasa')->nullable();
            $table->integer('jumlah_anak')->nullable();
            $table->foreign('id_wisata')->references('id')->on('wisatas')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('transaksis');
    }
};