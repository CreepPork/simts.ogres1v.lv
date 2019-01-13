<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'summary', 'body', 'image', 'event_at'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'event_at'];
}
