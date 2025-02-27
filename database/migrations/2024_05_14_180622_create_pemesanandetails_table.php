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
        Schema::create('pemesanandetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemesanan_id')->index();
            $table->unsignedBigInteger('product_id')->index();
            $table->string('nama');
            $table->double('harga');
            $table->integer('jumlah');
            $table->timestamps();

            $table->foreign('pemesanan_id')->references('id')->on('pemesanans')->cascadeOnDelete();
            // $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanandetails');
    }
};
