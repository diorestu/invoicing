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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('id_contract')->unsigned();
            $table->double('nominal', 15, 3)->nullable();
            $table->date('period')->nullable();
            $table->date('tgl_terbit')->nullable();
            $table->double('real_payment', 15, 3)->nullable();
            $table->double('ppn', 15, 3)->nullable();
            $table->double('pph', 15, 3)->nullable();
            $table->date('paid_at')->nullable();
            $table->enum('status', ['pending', 'terbit', 'cetak', 'diterima', 'overdue', 'dibayar',])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
