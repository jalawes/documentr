<?php

namespace App;

use App\Traits\Favoritable;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    use Favoritable;

    protected $fillable = [
        'body',
        'title',
        'user_id',
    ];

    protected $with = [
        'owner',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('favorites', function ($builder) {
            $builder->with('favorites');
            $builder->withCount('favorites');
        });

        static::created(function ($document) {
            Activity::create([
                'user_id'      => auth()->id(),
                'subject_id'   => $document->id,
                'subject_type' => Document::class,
                'type'         => 'created_document',
            ]);
        });
    }

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

    /**
     * The group that owns the document.
     */
    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function path()
    {
        return route('documents.show', $this);
    }
}
