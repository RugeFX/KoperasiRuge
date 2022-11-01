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
        Schema::create('pinjamen', function (Blueprint $table) {
            $table->id();
            $table->char('idPinjam', 10)->unique();
            $table->date('tanggal');
            $table->char('noAnggota', 10);
            $table->foreign('noAnggota')->references('noAnggota')->on('anggotas');
            $table->integer('jumlah');
            $table->smallInteger('lama', 6)->autoIncrement(false);
            $table->smallInteger('bunga', 6)->autoIncrement(false);
            $table->string('userId', 50)->nullable();
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
        Schema::dropIfExists('pinjamen');
    }
};
