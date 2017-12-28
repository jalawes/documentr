<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    public function subject()
    {
        return $this->morphTo();
    }

    /**
     * @param $user
     * @param $take
     * @return \Illuminate\Support\Collection
     */
    public static function feed($user, $take = 10)
    {
        return static::where('user_id', $user->id)
                    ->latest()
                    ->with('subject')
                    ->take($take)
                    ->get();
    }
}
