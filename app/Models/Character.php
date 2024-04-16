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
        return $this->belongsTo(Tribe::class);
    }
    public function main_classes() {
        return $this->belongsTo(MainClass::class);
    }
    public function support_classes() {
        return $this->belongsTo(SupportClass::class);
    }
    public function skills() {
        return $this->belongsToMany(Skill::class)->withTimestamps();
    }
    public function equipments() {
        return $this->belongsToMany(Equipment::class)->withTimestamps();
    }
}
