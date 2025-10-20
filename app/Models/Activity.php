<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function schedules()
    {
        return $this->hasMany(LabSchedule::class);
    }
}
