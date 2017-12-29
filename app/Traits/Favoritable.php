<?php


namespace App\Traits;


use App\Favorite;

trait Favoritable
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function favorite()
    {
        if (!$this->favorites->where('user_id', auth()->id())->count()) {
            return $this->favorites()->create(['user_id' => auth()->id()]);
        }
    }

    public function unfavorite()
    {
        return $this->favorites()->where('user_id', auth()->id())->delete();
    }

    public function isFavorited()
    {
        return (bool)$this->favorites->where('user_id', auth()->id())->count();
    }

    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
}
