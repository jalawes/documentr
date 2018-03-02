<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    /**
     * Scope a query to only include public Groups.
     *
     * @param \Illuminate\Database\Eloquent\\Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\\Illuminate\Database\Eloquent\Builder
     */
    public function scopePublic($query)
    {
        return $query->where('private', false);
    }
}
