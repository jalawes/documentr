<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Fetch the associated subject for the activity.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function subject()
    {
        return $this->morphTo();
    }

    /**
     * Fetch an activity feed for the given user.
     *
     * @param  User $user
     * @param  int  $take
     * @return \Illuminate\Database\Eloquent\Collection;
     */
    public static function feed($user, $take = 10)
    {
        return static::where('user_id', $user->id)
                     ->with('subject')
                     ->latest()
                     ->take($take)
                     ->get()
                     ->groupBy(function ($activity) {
                         return $activity->created_at->format('Y-m-d');
                     });
    }
}
