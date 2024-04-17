<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_classes')->insert([
            [
                'name' => 'ウォーリア',
                'strength_correction' => 1,
                'dexterity_correction' => 1,
                'agility_correction' => 1,
                'intelligence_correction' => 0,
                'sense_correction' => 0,
                'mental_correction' => 0,
                'luck_correction' => 0,
                'hp_correction' => 13,
                'mp_correction' => 10,
            ],
            [
                'name' => 'アコライト',
                'strength_correction' => 0,
                'dexterity_correction' => 1,
                'agility_correction' => 0,
                'intelligence_correction' => 1,
                'sense_correction' => 0,
                'mental_correction' => 1,
                'luck_correction' => 0,
                'hp_correction' => 11,
                'mp_correction' => 12,
            ],
            [
                'name' => 'メイジ',
                'strength_correction' => 0,
                'dexterity_correction' => 0,
                'agility_correction' => 0,
                'intelligence_correction' => 1,
                'sense_correction' => 1,
                'mental_correction' => 1,
                'luck_correction' => 0,
                'hp_correction' => 10,
                'mp_correction' => 13,
            ],
            [
                'name' => 'シーフ',
                'strength_correction' => 0,
                'dexterity_correction' => 1,
                'agility_correction' => 1,
                'intelligence_correction' => 0,
                'sense_correction' => 1,
                'mental_correction' => 0,
                'luck_correction' => 0,
                'hp_correction' => 12,
                'mp_correction' => 11,
            ],
        ]);
    }
}