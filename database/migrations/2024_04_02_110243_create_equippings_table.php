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
        Schema::create('equippings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->enum('type', ['右手', '左手', '頭部', '胴部', '補助防具', '装身具']);
            $table->integer('weight')->default(0);
            $table->integer('accuracy_correction')->default(0);
            $table->integer('power')->default(0);
            $table->integer('avoid_correction')->default(0);
            $table->integer('physical_defense')->default(0);
            $table->integer('magic_defense')->default(0);
            $table->integer('action_correction')->default(0);
            $table->integer('move_correction')->default(0);
            $table->string('range')->default(0);
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equippings');
    }
};
