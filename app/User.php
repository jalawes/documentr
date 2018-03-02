<?php

namespace App;

use App\Traits\RecordsActivity;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, RecordsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'avatar',
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
        'password',
        'remember_token',
    ];

    /**
     * Return the key to be used as the username during authentication.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Name accessor.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Return the Channels to which the User belongs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function channels()
    {
        return $this->belongsToMany(Channel::class);
    }

    /**
     * Return all the User's activities.
     *
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }

    /**
     * Return the User's document.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    /**
     * Return all the libraries to which the user belongs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function libraries()
    {
        return $this->belongsToMany(Library::class);
    }

    /**
     * Return the User's authentication provider.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function authenticationProvider()
    {
        return $this->hasOne(AuthenticationProvider::class);
    }

    /**
     * Join the User to the channel.
     *
     * @param $channel
     */
    public function join($channel)
    {
        return $this->channels()->attach($channel);
    }

    /**
     * Join the User to the library.
     *
     * @param $group
     */
    public function joinLibrary($group)
    {
        return $this->libraries()->attach($group);
    }

    /**
     * Return the route to show the User.
     *
     * @return string
     */
    public function path()
    {
        return route('profiles.show', $this);
    }
}
