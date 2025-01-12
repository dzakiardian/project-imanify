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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->string('item_name', 255);
            $table->string('description', 255);
            $table->string('date_brrowed', 255);
            $table->string('date_returned', 255);
            $table->enum('status', ['borrowed', 'returned']);
            $table->unsignedBigInteger('officer');
            $table->foreign('officer')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
