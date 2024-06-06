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
        Schema::table('perencanaan_pkpt', function (Blueprint $table) {
            $table->integer('pj')->nullable();
            $table->integer('pt_wpj')->nullable();
            $table->integer('kt')->nullable();
            $table->integer('at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perencanaan_pkpt', function (Blueprint $table) {
            $table->dropColumn('pj');
            $table->dropColumn('pt_wpj');
            $table->dropColumn('kt');
            $table->dropColumn('at');
        });
    }
};
