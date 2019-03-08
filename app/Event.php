<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $fillable = ['creator', 'title', 'description', 'date_creation', 'date_event', 'location_name', 'latitude', 'longitude'];
}
