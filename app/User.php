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

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function join($channel)
    {
        return $this->channels()->attach($channel);
    }

    public function joinGroup($group)
    {
        return $this->groups()->attach($group);
    }
}
