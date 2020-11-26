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
            $table->id('history_id');
            $table->foreignId('tugas_id');
            $table->foreignId('user_id');
            $table->foreignId('ruang_id');
            $table->enum('status', ['SUDAH', 'BELUM']);
            $table->string('bukti1');
            $table->string('bukti2');
            $table->string('bukti3');
            $table->string('bukti4');
            $table->string('bukti5');
            $table->dateTime('tanggal_penugasan', 0);
            $table->dateTime('tanggal_selesai', 0);
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
