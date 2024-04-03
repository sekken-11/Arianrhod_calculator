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
        Schema::create('main_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('strength_correction')->default(0);
            $table->integer('dexterity_correction')->default(0);
            $table->integer('agility_correction')->default(0);
            $table->integer('intelligence_correction')->default(0);
            $table->integer('sense_correction')->default(0);
            $table->integer('mental_correction')->default(0);
            $table->integer('luck_correction')->default(0);
            $table->integer('hp_correction');
            $table->integer('mp_correction');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_classes');
    }
};
