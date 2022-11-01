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
        Schema::create('pinjaman_details', function (Blueprint $table) {
            $table->id();
            $table->char('idPinjam', 10);
            $table->foreign('idPinjam')->references('idPinjam')->on('pinjamen');
            $table->smallInteger('cicilan', 6)->autoIncrement(false);
            $table->integer('angsuran');
            $table->integer('bunga');
            $table->date('tglBayar')->nullable();
            $table->integer('jumlahBayar')->nullable();
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
        Schema::dropIfExists('pinjaman_details');
    }
};
