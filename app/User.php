<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function channels()
    {
        return $this->belongsToMany(Channel::class);
    }

    public function libraries()
    {
        return $this->belongsToMany(Library::class);
    }

    public function join($channel)
    {
        return $this->channels()->attach($channel);
    }

    public function joinLibrary($group)
    {
        return $this->libraries()->attach($group);
    }
}
