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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('level')->default(1);
            $table->enum('timing', ['効果参照', '判定直前', 'メジャー', 'マイナー', 'パッシブ', 'アイテム']);
            $table->string('judge')->nullable();
            $table->string('target')->nullable();
            $table->string('range')->nullable();
            $table->integer('cost')->nullable();
            $table->integer('level_limit')->default(1);
            $table->text('effect')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};