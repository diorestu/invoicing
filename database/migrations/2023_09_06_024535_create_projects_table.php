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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 160);
            $table->string('kategori', 60);
            $table->text('deskripsi')->nullable();
            $table->string('telp', 30)->nullable();
            $table->string('tembusan', 100)->nullable();
            $table->text('alamat')->nullable();
            $table->text('logo')->nullable();
            $table->enum('vendor', ['asta', 'air'])->nullable();
            $table->enum('status', ['y', 'n'])->default('y');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
