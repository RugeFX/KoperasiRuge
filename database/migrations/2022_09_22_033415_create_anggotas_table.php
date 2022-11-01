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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->char('noAnggota', 10)->unique();
            $table->string('namaAnggota', 50);
            $table->char('jKelamin', 2);
            $table->string('tempatLahir', 50);
            $table->date('tglLahir', 10);
            $table->string('alamat', 50);
            $table->char('noTelpon', 30);
            $table->char('noIdentitas', 30);
            $table->string('password', 30)->nullable();
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
        Schema::dropIfExists('anggotas');
    }
};
