<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Silber\Bouncer\Database\HasRolesAndAbilities;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property \App\Models\Adherent|null $adherent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Event> $events
 * @property \Illuminate\Database\Eloquent\Relations\Pivot $pivot
 */
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the adherent record associated with the user.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne<Adherent, $this>
     */
    public function adherent()
    {
        return $this->hasOne(Adherent::class);
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::created(function (User $user) {
            $user->adherent()->create([
                'formule' => null,
                'value' => 0,
            ]);
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Event, $this>
     */
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
