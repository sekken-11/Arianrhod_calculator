<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tribe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'strength_base',
        'dexterity_base',
        'agility_base',
        'intelligence_base',
        'sense_base',
        'mental_base',
        'luck_base',
        'hp_base',
        'mp_base',
        'fate_base',
        'weight_limit',
    ];

    public function characters() {
        return $this->belongsToMany(Character::class)->withTimestamps();
    }
}
