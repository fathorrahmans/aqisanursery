<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring', function (Blueprint $table) {
            $table->id();
            $table->float('suhu')->nullable();
            $table->float('kelembapan')->nullable();
            $table->float('cahaya')->nullable();
            $table->float('kipas')->nullable();
            $table->float('pompa')->nullable();
            $table->float('atap')->nullable();
            $table->timestamp('tanggal_waktu')->nullable();
            $table->enum('keterangan', ['otomatis', 'manual'])->nullable();
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
        Schema::dropIfExists('monitoring');
    }
}
