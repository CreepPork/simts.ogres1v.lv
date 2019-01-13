<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkStatus extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status'
    ];

    /**
     * A status may have multiple works.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
