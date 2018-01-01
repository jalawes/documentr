<?php

namespace App;

use App\Traits\Favoritable;
use App\Traits\RecordsActivity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use Favoritable, RecordsActivity;

    protected $fillable = [
        'body',
        'title',
        'user_id',
    ];

    protected $with = [
        'owner',
        'favorites',
    ];

    protected $appends = [
        'isFavorited',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('favorites', function (Builder $builder) {
            // $builder->with('favorites');
            $builder->withCount('favorites');
        });

        static::deleting(function ($document) {
            $document->favorites->each->delete();
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

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function path()
    {
        return route('documents.show', $this);
    }

    public function subscribe($user_id = null)
    {
        $this->subscriptions()->create([
            'user_id' => $user_id ?? auth()->id(),
        ]);
    }

    public function unsubscribe($user_id = null)
    {
        $this->subscriptions()->where('user_id', $user_id ?? auth()->id())->delete();
    }

    public function subscriptions()
    {
        return $this->hasMany(DocumentSubscription::class);
    }
}
