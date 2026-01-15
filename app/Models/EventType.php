<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EventType extends Model
{
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Event, $this>
     */
    public function events()
    {
        return $this->belongsToMany(Event::class, 'events_asigne_type');
    }
}
