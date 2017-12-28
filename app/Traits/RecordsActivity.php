<?php


namespace App\Traits;


use App\Activity;
use ReflectionClass;

trait RecordsActivity
{

    protected static function bootRecordsActivity()
    {
        if (auth()->guest()) return;

        foreach (self::getActivitiesToRecord() as $event) {
            static::created(function ($model) use ($event) {
                $model->recordActivity($event);
            });
        }

        static::deleting(function ($model) {
            $model->activity->each(function ($activity) {
                $activity->delete();
            });
        });
    }

    protected static function getActivitiesToRecord()
    {
        return ['created'];
    }

    protected function recordActivity($event)
    {
        $this->activity()->create([
            'user_id'      => auth()->id(),
            'type'         => $this->getActivityType($event),
        ]);
    }

    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject');
    }

    protected function getActivityType($event)
    {
        return $event . '_' . strtolower((new ReflectionClass($this))->getShortName());
    }
}
