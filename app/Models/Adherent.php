<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{
    protected $fillable = ['user_id', 'formule', 'value'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
