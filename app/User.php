<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'photo_path',
        'email',
        'password',
        'authentication_provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function username()
    {
        return 'username';
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function channels()
    {
        return $this->belongsToMany(Channel::class);
    }

    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function libraries()
    {
        return $this->belongsToMany(Library::class);
    }

    public function authentication_provider()
    {
        return $this->hasOne(AuthenticationProvider::class);
    }

    public function join($channel)
    {
        return $this->channels()->attach($channel);
    }

    public function joinLibrary($group)
    {
        return $this->libraries()->attach($group);
    }

    public function path()
    {
        return route('profiles.show', $this);
    }
}
