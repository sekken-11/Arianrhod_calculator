<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ]

    public function tribes() {
        return $this->belongsToMany(Tribe::class)->withTimestamps();
    }
    public function main_classes() {
        return $this->belongsToMany(MainClass::class)->withTimestamps();
    }
    public function support_classes() {
        return $this->belongsToMany(SupportClass::class)->withTimestamps();
    }
    public function skills() {
        return $this->belongsToMany(Skill::class)->withTimestamps();
    }
    public function equipments() {
        return $this->belongsToMany(Equipment::class)->withTimestamps();
    }
}
