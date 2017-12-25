<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'body',
        'user_id'
    ];

    /**
     * Scope a query to only include public documents.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublic($query)
    {
        return $query->where('private', 0);
    }

    /**
     * The user that owns the document.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
