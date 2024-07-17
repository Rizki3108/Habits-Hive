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
        Schema::table('pengingats', function (Blueprint $table) {
            $table->unsignedBigInteger('catatan_id')->nullable();
            $table->foreign('catatan_id')->references('id')->on('catatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengingats', function (Blueprint $table) {
            $table->dropForeign(['catatan_id']);
            $table->dropColumn('catatan_id');
        });
    }
};
