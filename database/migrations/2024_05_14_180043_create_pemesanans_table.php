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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('user_nama');
            $table->string('user_alamat');
            $table->string('user_telp');
            $table->integer('bank_id')->nullable();
            $table->string('bank_bank')->nullable();
            $table->string('bank_rekening')->nullable();
            $table->string('bank_pemilik')->nullable();
            $table->string('bukti')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            // $table->foreign('bank_id')->references('id')->on('banks')->cascadeOnDelete();
            // $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            // $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
