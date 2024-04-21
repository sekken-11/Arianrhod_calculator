<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'level', 
        'timing', 
        'judge',
        'target',
        'range',
        'cost',
        'level_limit',
        'effect',
        'source',
    ];

    public function characters() {
        return $this->belongsToMany(Character::class, 'character_skill')->withTimestamps();
    }
}
