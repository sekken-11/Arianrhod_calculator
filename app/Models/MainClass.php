<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'strength_correction',
        'dexterity_correction',
        'agility_correction',
        'intelligence_correction',
        'sense_correction',
        'mental_correction',
        'luck_correction',
        'hp_correction',
        'mp_correction',
        'hp_up',
        'mp_up',
    ];

    public function characters() {
        return $this->hasMany(Character::class);
    }
}
