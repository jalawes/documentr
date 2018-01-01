<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthenticationProvider extends Model
{
    const TYPES = [
        'github',
    ];

    protected $fillable = [
        'type',
        'provider_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
