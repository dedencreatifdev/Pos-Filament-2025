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
        Schema::create('produks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type',25);
            $table->string('kode',25);
            $table->string('nama',50);

            $table->foreignUuid('kategori_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('merk_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('unit_id')->constrained()->cascadeOnDelete();

            $table->string('deskripsi')->nullable();
            $table->string('spesifikasi')->nullable();
            $table->double('harga',18,8)->nullable()->default(0.00);
            $table->integer('disc_max')->nullable()->default(0.00);
            $table->integer('alert')->nullable()->default(0);

            $table->integer('berat')->nullable()->default(0.00);
            $table->integer('panjang')->nullable()->default(0.00);
            $table->integer('lebar')->nullable()->default(0.00);
            $table->integer('tinggi')->nullable()->default(0.00);


            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->foreignUuid('gudang_id')->constrained()->cascadeOnDelete();
            $table->string('status')->default('active'); // 'active', 'inactive', 'banned', etc.


            $table->timestamps();
        });
        Schema::create('produk_team', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('team_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('produk_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
        Schema::dropIfExists('produk_team');
    }
};
