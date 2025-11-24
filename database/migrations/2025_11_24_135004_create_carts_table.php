<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('session_key')->nullable(); // for guest users
            $table->unsignedBigInteger('user_id')->nullable(); // if you have auth
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('carts');
    }
};