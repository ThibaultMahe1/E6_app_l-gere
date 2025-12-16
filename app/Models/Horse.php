<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    /** @use HasFactory<\Database\Factories\HorseFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'photo_path',
        'type',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];
}
