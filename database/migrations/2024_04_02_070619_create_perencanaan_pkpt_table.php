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
        Schema::create('perencanaan_pkpt', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 30);
            $table->string('nama', 225);
            $table->string('jenis', 225);
            $table->string('unit', 30);
            $table->string('tujuan_audit', 225);
            $table->string('ruang_lingkup')->nullable()->default(null);
            $table->string('susunan_tim', 225);
            $table->string('waktu_dk')->default(0);
            $table->string('waktu_lk')->default(0);
            $table->string('waktu_hp')->default(0);
            $table->string('biaya_dk')->nullable()->default(0);
            $table->string('biaya_lk', 225)->nullable()->default(0);
            $table->string('total', 225)->default(0);
            $table->string('rmp', 225)->nullable();
            $table->string('rpl', 225)->nullable();
            $table->string('lha', 225)->default(0);
            $table->string('peralatan', 225);
            $table->string('keterangan', 225)->nullable();
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
        Schema::dropIfExists('perencanaan_pkpt');
    }
};
