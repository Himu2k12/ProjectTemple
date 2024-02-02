<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use Sluggable;


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'event_title'
            ]
        ];
    }
}
