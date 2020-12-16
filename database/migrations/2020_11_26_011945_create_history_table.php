<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->increments('id_history');
            $table->integer('id_tugas')->unsigned()->nullable();
            $table->integer('id_cs')->unsigned()->nullable();
            $table->integer('id_ruang')->unsigned()->nullable();
            $table->foreign('id_cs')->references('id_user')->on('users')->onDelete('CASCADE');
            $table->foreign('id_ruang')->references('id_ruang')->on('ruang')->onDelete('CASCADE');
            $table->foreign('id_tugas')->references('id_tugas')->on('tugas')->onDelete('CASCADE');
            $table->enum('old_status', ['SUDAH', 'BELUM']);
            $table->string('old_bukti1')->nullable();
            $table->string('old_bukti2')->nullable();
            $table->string('old_bukti3')->nullable();
            $table->string('old_bukti4')->nullable();
            $table->string('old_bukti5')->nullable();
            $table->dateTime('old_tanggal_penugasan', 0)->nullable();
            $table->dateTime('old_tanggal_selesai', 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history');
    }
}
