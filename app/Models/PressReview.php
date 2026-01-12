<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'link',
    ];
    
    protected $casts = [
        'date' => 'date',
    ];
}
