<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property array|null $daily_schedule
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EventType> $eventTypes
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property \Illuminate\Database\Eloquent\Relations\Pivot $pivot
 */
class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'daily_schedule',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'daily_schedule' => 'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<User, $this>
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['date', 'is_cancelled']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<EventType, $this>
     */
    public function eventTypes()
    {
        return $this->belongsToMany(EventType::class, 'events_asigne_type');
    }
}
