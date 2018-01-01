<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthenticationProvider extends Model
{
    protected $fillable = [
        'provider',
        'provider_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
