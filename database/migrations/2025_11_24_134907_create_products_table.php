<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // path di storage/app/public/products/...
            $table->unsignedBigInteger('price'); // in cents or smallest currency unit
            $table->integer('stock')->default(999);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('products');
    }
};