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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->enum('gender', ['男性', '女性', 'その他']);
            $table->integer('level')->default(1);
            $table->integer('strength_bonus')->default(0);
            $table->integer('dexterity_bonus')->default(0);
            $table->integer('agility_bonus')->default(0);
            $table->integer('intelligence_bonus')->default(0);
            $table->integer('sense_bonus')->default(0);
            $table->integer('mental_bonus')->default(0);
            $table->integer('luck_bonus')->default(0);
            $table->integer('height')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('skin_color')->nullable();

            $table->integer('present_hp');
            $table->integer('hp_correction');
            $table->integer('present_mp');
            $table->integer('mp_correction');
            $table->integer('fate');
            $table->integer('fate_correction');
            $table->integer('fate_limit_correction');

            $table->integer('weapon_weight_correction');
            $table->integer('armor_weight_correction');
            $table->integer('item_weight_correction');

            $table->string('hometown')->nullable();
            $table->string('origins')->nullable();
            $table->string('environment')->nullable();
            $table->string('purpose')->nullable();
            $table->string('origins_remarks')->nullable();
            $table->string('environment_remarks')->nullable();
            $table->string('purpose_remarks')->nullable();

            $table->integer('money')->default(0);
            $table->string('initial_main_class');
            $table->string('initial_support_class');

            $table->integer('strength_correction')->default(0);
            $table->integer('dexterity_correction')->default(0);
            $table->integer('agility_correction')->default(0);
            $table->integer('intelligence_correction')->default(0);
            $table->integer('sense_correction')->default(0);
            $table->integer('mental_correction')->default(0);
            $table->integer('luck_correction')->default(0);

            $table->integer('strength_correction_second')->default(0);
            $table->integer('dexterity_correction_second')->default(0);
            $table->integer('agility_correction_second')->default(0);
            $table->integer('intelligence_correction_second')->default(0);
            $table->integer('sense_correction_second')->default(0);
            $table->integer('mental_correction_second')->default(0);
            $table->integer('luck_correction_second')->default(0);

            $table->foreignId('tribe_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('main_class_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('support_class_id')->nullable()->constrained()->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
