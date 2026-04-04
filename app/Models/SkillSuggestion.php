<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillSuggestion extends Model
{
    protected $fillable = [
        'name',
        'skills',
        'hit_count'
    ];
    // App\Models\SkillSuggestion.php
    protected $casts = [
        'skills' => 'array',
    ];
}
