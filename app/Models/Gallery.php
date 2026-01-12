<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'cover_image',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function photos()
    {
        return $this->hasMany(GalleryPhoto::class);
    }
}
