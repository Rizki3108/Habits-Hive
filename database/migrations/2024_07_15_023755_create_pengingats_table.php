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
        Schema::create('pengingats', function (Blueprint $table) {
            $table->id();
            $table->string('judul_pengingat');
            $table->text('deskripsi');
            $table->date('tanggal')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('catatan_id')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('pengingats');
    }
};
