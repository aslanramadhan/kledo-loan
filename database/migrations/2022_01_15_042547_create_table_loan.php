<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLoan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kledo_loan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_diajukan');
            $table->date('tanggal_disetujui')->nullable(true);
            $table->integer('pegawai_id');
            $table->integer('total_kasbon');
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
        Schema::dropIfExists('kledo_loan');
    }
}
