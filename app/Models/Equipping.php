<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'weight', 
        'accuracy_correction', 
        'power', 
        'avoid_correction',
        'physical_defense', 
        'magic_defense', 
        'action_correction', 
        'move_correction',
        'range', 
        'remarks'
    ];

    public function characters() {
        return $this->belongsToMany(Character::class, 'character_equipping')->withTimestamps();
    }
}
