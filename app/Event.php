<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $fillable = ['creator', 'title', 'description', 'location', 'date_creation', 'date_event'];
}
