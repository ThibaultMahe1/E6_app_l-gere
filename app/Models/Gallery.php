<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $date
 * @property string|null $cover_image
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GalleryPhoto> $photos
 */
class Gallery extends Model
{
    /** @use HasFactory<\Database\Factories\GalleryFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'cover_image',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<GalleryPhoto, $this>
     */
    public function photos()
    {
        return $this->hasMany(GalleryPhoto::class);
    }
}
