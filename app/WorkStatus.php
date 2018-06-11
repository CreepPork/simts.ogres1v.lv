<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkStatus extends Model
{
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
