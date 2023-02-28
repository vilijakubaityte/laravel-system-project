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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string("reg_number", 32);
            $table->string("brand", 32);
            $table->string("model",32);
            $table->unsignedBigInteger("owners_id");
            $table->timestamps();

            $table->foreign("owners_id")->references("id")->on("owners");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
