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

        /**
         * Add the favorite count to each favorites query.
         */
        static::addGlobalScope('favorites', function (Builder $builder) {
            $builder->withCount('favorites');
        });

        /**
         * Delete the favorites that belong to a document.
         */
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

    /**
     * Return the owner of the Document.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Return the Library to which the Document belongs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    /**
     * Return the route for to show the Document.
     *
     * @return string
     */
    public function path()
    {
        return route('documents.show', $this);
    }

    /**
     * Subscribe a user to the Document.
     *
     * @param null $user_id
     */
    public function subscribe($user_id = null)
    {
        $this->subscriptions()->create([
            'user_id' => $user_id ?? auth()->id(),
        ]);
    }

    /**
     * Remove the document from a User's subscriptions.
     *
     * @param null $user_id
     */
    public function unsubscribe($user_id = null)
    {
        $this->subscriptions()->where('user_id', $user_id ?? auth()->id())->delete();
    }

    /**
     * Return the subscriptions of the Document.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriptions()
    {
        return $this->hasMany(DocumentSubscription::class);
    }
}
