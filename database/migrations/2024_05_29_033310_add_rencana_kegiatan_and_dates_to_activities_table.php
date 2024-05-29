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
        Schema::table('perencanaan_rpkh', function (Blueprint $table) {
    
            $table->text('rencana_kegiatan')->after('tanggal_pelaksanaan_kegiatan'); // Menambahkan kolom Rencana Kegiatan setelah kolom Kartu Penugasan
            $table->date('start_date')->after('keterangan'); // Menambahkan kolom Tanggal Mulai setelah kolom Rencana Kegiatan
            $table->date('end_date')->after('start_date'); // Menambahkan kolom Tanggal Selesai setelah kolom Tanggal Mulai
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
            $table->dropColumn('rencana_kegiatan'); // Menghapus kolom Rencana Kegiatan saat rollback
            $table->dropColumn('start_date'); // Menghapus kolom Tanggal Mulai saat rollback
            $table->dropColumn('end_date'); // Menghapus kolom Tanggal Selesai saat rollback
        });
    }
};
