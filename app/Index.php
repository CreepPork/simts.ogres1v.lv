<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    protected $fillable = [
        'section',
        'section_title',
        'title',
        'body',
        'image',
        'file'
    ];

    protected $table = 'indexes';
}
