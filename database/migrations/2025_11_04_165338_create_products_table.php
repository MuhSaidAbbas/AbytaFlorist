<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // kolom id (primary key)
            $table->string('name'); // nama produk
            $table->text('description')->nullable(); // deskripsi
            $table->decimal('price', 10, 2); // harga
            $table->string('category')->nullable(); // kategori (buket, bloom box, dll)
            $table->string('image')->nullable(); // link gambar produk
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
