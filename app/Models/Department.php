<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function schedules()
    {
        return $this->hasMany(LabSchedule::class);
    }
}
