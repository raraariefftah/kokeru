<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->increments('id_tugas');
            $table->integer('id_user')->unsigned()->nullable();
            $table->integer('id_ruang')->unsigned()->nullable();
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('CASCADE');
            $table->foreign('id_ruang')->references('id_ruang')->on('ruang')->onDelete('CASCADE');
            $table->enum('status', ['SUDAH', 'BELUM']);
            $table->string('bukti1')->nullable();
            $table->string('bukti2')->nullable();
            $table->string('bukti3')->nullable();
            $table->string('bukti4')->nullable();
            $table->string('bukti5')->nullable();
            $table->dateTime('tanggal_penugasan', 0)->nullable();
            $table->dateTime('tanggal_selesai', 0)->nullable();
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
        Schema::dropIfExists('tugas');
    }
}
