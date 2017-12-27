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
        'first_name',
        'last_name',
        'photo_path',
        'email',
        'password',
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

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function channels()
    {
        return $this->belongsToMany(Channel::class);
    }

    /**
     * Get the documents for the User.
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
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

    /**
     * @param
     * @return bool
     */
    public function isOwnerOf($document)
    {
        return $document->owner->id === $this->id;
    }
}
