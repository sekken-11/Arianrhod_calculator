<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tribes')->insert([
            [
                'name' => 'ヒューリン',
                'strength_base' => 9,
                'dexterity_base' => 9,
                'agility_base' => 8,
                'intelligence_base' => 8,
                'sense_base' => 8,
                'mental_base' => 8,
                'luck_base' => 9,
                'hp_base' => 9,
                'mp_base' => 8,
                'fate_base' => 5,
                'weight_limit' => 9,
            ],
            [
                'name' => 'エルダナーン',
                'strength_base' => 7,
                'dexterity_base' => 8,
                'agility_base' => 8,
                'intelligence_base' => 10,
                'sense_base' => 7,
                'mental_base' => 10,
                'luck_base' => 7,
                'hp_base' => 7,
                'mp_base' => 10,
                'fate_base' => 5,
                'weight_limit' => 7,
            ],
            [
                'name' => 'ネヴァーフ',
                'strength_base' => 10,
                'dexterity_base' => 11,
                'agility_base' => 7,
                'intelligence_base' => 8,
                'sense_base' => 7,
                'mental_base' => 8,
                'luck_base' => 6,
                'hp_base' => 10,
                'mp_base' => 8,
                'fate_base' => 5,
                'weight_limit' => 10,
            ],
            [
                'name' => 'フィルボル',
                'strength_base' => 6,
                'dexterity_base' => 8,
                'agility_base' => 9,
                'intelligence_base' => 7,
                'sense_base' => 8,
                'mental_base' => 11,
                'luck_base' => 8,
                'hp_base' => 6,
                'mp_base' => 11,
                'fate_base' => 5,
                'weight_limit' => 6,
            ],
            [
                'name' => 'ヴァーナ',
                'strength_base' => 8,
                'dexterity_base' => 7,
                'agility_base' => 12,
                'intelligence_base' => 6,
                'sense_base' => 10,
                'mental_base' => 6,
                'luck_base' => 8,
                'hp_base' => 8,
                'mp_base' => 6,
                'fate_base' => 5,
                'weight_limit' => 8,
            ],
            [
                'name' => 'ドゥアン',
                'strength_base' => 12,
                'dexterity_base' => 8,
                'agility_base' => 8,
                'intelligence_base' => 6,
                'sense_base' => 7,
                'mental_base' => 9,
                'luck_base' => 7,
                'hp_base' => 12,
                'mp_base' => 9,
                'fate_base' => 5,
                'weight_limit' => 12,
            ],
            [
                'name' => 'アーシアン',
                'strength_base' => 8,
                'dexterity_base' => 9,
                'agility_base' => 8,
                'intelligence_base' => 9,
                'sense_base' => 8,
                'mental_base' => 7,
                'luck_base' => 8,
                'hp_base' => 8,
                'mp_base' => 7,
                'fate_base' => 5,
                'weight_limit' => 8,
            ],
        ]);
    }
}
