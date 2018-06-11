<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * Return full name (first and last name) for the teacher.
     *
     * @return string
     */
    public function fullName()
    {
        return ($this->first_name . ' ' . $this->last_name);
    }

    /**
     * A teacher may have multiple works assigned to them.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
