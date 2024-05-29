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
        Schema::create('perencanaan_rpkh', function (Blueprint $table) {
            $table->id();
            $table->string('hari'); // Kolom Hari
            $table->date('tanggal_pelaksanaan_kegiatan'); // Kolom Tanggal Pelaksanaan Kegiatan
            $table->string('tim'); // Kolom Tim
            $table->text('realisasi_kegiatan'); // Kolom Realisasi Kegiatan
            $table->text('keterangan')->nullable(); // Kolom Keterangan
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
        Schema::dropIfExists('perencanaan_rpkh');
    }
};
