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
        Schema::create('tribes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('strength_base')->default(0);
            $table->integer('dexterity_base')->default(0);
            $table->integer('agility_base')->default(0);
            $table->integer('intelligence_base')->default(0);
            $table->integer('sense_base')->default(0);
            $table->integer('mental_base')->default(0);
            $table->integer('luck_base')->default(0);
            $table->integer('hp_base');
            $table->integer('mp_base');
            $table->integer('fate_base');
            $table->integer('weight_limit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tribes');
    }
};
