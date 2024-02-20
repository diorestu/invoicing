<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contracts_addendum', function (Blueprint $table) {
            $table->id();
            $table->integer('id_contract')->unsigned();
            $table->integer('no_add')->unsigned()->nullable();
            $table->text('nama_pekerjaan')->nullable();
            $table->string('no_kontrak_klien', 100)->nullable();
            $table->string('no_kontrak_asta', 100)->nullable();
            $table->date('tgl_addendum')->nullable();
            $table->string('tgl_penagihan')->nullable();
            $table->integer('lama_kontrak')->unsigned()->nullable();
            $table->double('nominal_kontrak', 15, 3)->nullable();
            $table->double('inv_per_bulan', 15, 3)->nullable();
            $table->integer('jumlah_sdm')->unsigned();
            $table->integer('term_of_payment')->unsigned();
            $table->double('bpjs_kes', 15, 3)->nullable();
            $table->double('bpjs_tk', 15, 3)->nullable();
            $table->double('salary', 15, 3)->nullable();
            $table->double('ppn', 15, 3)->nullable();
            $table->double('pph', 15, 3)->nullable();
            $table->double('fee_management', 15, 3)->nullable();
            $table->enum('add_tipe', ['initial', 'addendum'])->default('initial');
            $table->enum('tipe', ['sdm', 'pekerjaan', 'event'])->nullable();
            $table->enum('status', ['accept', 'pending', 'decline'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
