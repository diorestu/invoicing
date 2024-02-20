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
        Schema::create('invoice_prints', function (Blueprint $table) {
            $table->id();
            $table->integer('id_invoice')->unsigned();
            $table->date('tgl_terbit_inv')->nullable();
            $table->string('nomor_po', 100)->nullable();
            $table->string('periode', 100)->nullable();
            $table->double('grand_total', 15, 3)->nullable();
            $table->double('ppn', 15, 3)->nullable();
            $table->double('pph', 15, 3)->nullable();
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
        Schema::dropIfExists('invoice_prints');
    }
};
