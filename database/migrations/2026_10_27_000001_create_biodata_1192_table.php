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
        Schema::create('Biodata_1192', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('profesi');
            $table->string('email')->unique();
            $table->string('telepon');
            $table->string('alamat');
            $table->text('ringkasan')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Biodata_1192');
    }
};
