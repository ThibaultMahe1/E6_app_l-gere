<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryPhoto extends Model
{
    /** @use HasFactory<\Database\Factories\GalleryPhotoFactory> */
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'image_path',
        'title',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Gallery, $this>
     */
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
