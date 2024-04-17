<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'player_name',
        'age',
        'gender',
        'level',
        'strength_bonus',
        'dexterity_bonus',
        'agility_bonus',
        'intelligence_bonus',
        'sense_bonus',
        'mental_bonus',
        'luck_bonus',
        'height',
        'hair_color',
        'eye_color',
        'skin_color',
        'hp_correction',
        'mp_correction',
        'fate_correction',
        'fate_limit_correction',
        'weapon_weight_correction',
        'armor_weight_correction',
        'item_weight_correction',
        'hometown',
        'origins',
        'environment',
        'purpose',
        'origins_remarks',
        'environment_remarks',
        'purpose_remarks',
        'money',
        'initial_main_class',
        'initial_support_class',
        'strength_correction',
        'dexterity_correction',
        'agility_correction',
        'intelligence_correction',
        'sense_correction',
        'mental_correction',
        'luck_correction',
        'strength_correction_second',
        'dexterity_correction_second',
        'agility_correction_second',
        'intelligence_correction_second',
        'sense_correction_second',
        'mental_correction_second',
        'luck_correction_second',
        'tribe_id',
        'main_class_id',
        'support_class_id',
        'user_id',
    ];

    public function tribe() {
        return $this->belongsTo(Tribe::class);
    }
    public function main_class() {
        return $this->belongsTo(MainClass::class);
    }
    public function support_class() {
        return $this->belongsTo(SupportClass::class);
    }
    public function skills() {
        return $this->belongsToMany(Skill::class, 'character_skill')->withTimestamps();
    }
    public function equippings() {
        return $this->belongsToMany(Equipping::class, 'character_equipping')->withTimestamps();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
