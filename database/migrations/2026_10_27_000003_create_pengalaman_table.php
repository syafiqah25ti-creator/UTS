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
        Schema::create('pengalaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('biodata_id')->nullable();
            $table->string('posisi');
            $table->string('perusahaan');
            $table->string('tahun_mulai');
            $table->string('tahun_selesai');
            $table->text('deskripsi')->nullable();
            $table->timestamps();

            $table->foreign('biodata_id')->references('id')->on('Biodata_1192')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalaman');
    }
};
