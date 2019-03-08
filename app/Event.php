<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['creator', 'title', 'description', 'date_event', 'location_name', 'latitude', 'longitude'];
}
