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
        Schema::create('pengambilans', function (Blueprint $table) {
            $table->id();
            $table->char('idAmbil', 10)->unique();
            $table->date('tanggal', 10);
            $table->char('noAnggota', 10);
            $table->foreign('noAnggota')->references('noAnggota')->on('anggotas');
            $table->integer('jumlah', 10)->autoIncrement(false);
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
        Schema::dropIfExists('pengambilans');
    }
};
