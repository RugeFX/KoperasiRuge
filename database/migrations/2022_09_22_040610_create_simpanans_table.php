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
        Schema::create('simpanans', function (Blueprint $table) {
            $table->id();
            $table->integer('idSimpanan')->unique();
            $table->date('tanggal');
            $table->char('noAnggota', 10);
            $table->foreign('noAnggota')->references('noAnggota')->on('anggotas');
            $table->char('idJenis', 2);
            $table->foreign('idJenis')->references('idJenis')->on('jenis_simpanans');
            $table->integer('jumlah');
            $table->string('userId', 50)->nullable();
            $table->foreign('userId')->references('userId')->on('penggunas');
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
        Schema::dropIfExists('simpanans');
    }
};
