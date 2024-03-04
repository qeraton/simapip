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
        Schema::create('riwayat_jabatan', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pegawai_id');
            $table->unsignedBigInteger('ref_jabatan_id');
            $table->unsignedBigInteger('ref_jenjang_jabatan_id');
            $table->string('nomor_sk', 30);
            $table->date('tanggal_sk');
            $table->date('tmt');
            $table->string('file_sk', 250);

            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pegawai_id')->references('id')->on('pegawai');
            $table->foreign('ref_jabatan_id')->references('id')->on('ref_jabatan');
            $table->foreign('ref_jenjang_jabatan_id')->references('id')->on('ref_jenjang_jabatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_jabatan');
    }
};
