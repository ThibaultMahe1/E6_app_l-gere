<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    /** @use HasFactory<\Database\Factories\TarifFactory> */
    use HasFactory;

    protected $fillable = [
        'category',
        'section',
        'title',
        'description',
        'price',
        'promo_text',
        'frequency',
    ];
}
