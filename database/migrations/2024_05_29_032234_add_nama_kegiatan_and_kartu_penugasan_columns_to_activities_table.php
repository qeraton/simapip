<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaKegiatanAndKartuPenugasanColumnsToActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perencanaan_rpkh', function (Blueprint $table) {
            $table->string('nama_kegiatan')->before('hari'); // Menambahkan kolom Nama Kegiatan sebelum kolom Hari
            $table->string('kartu_penugasan')->after('nama_kegiatan'); // Menambahkan kolom Kartu Penugasan setelah kolom Nama Kegiatan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perencanaan_rpkh', function (Blueprint $table) {
            $table->dropColumn('nama_kegiatan'); // Menghapus kolom Nama Kegiatan saat rollback
            $table->dropColumn('kartu_penugasan'); // Menghapus kolom Kartu Penugasan saat rollback
        });
    }
}
