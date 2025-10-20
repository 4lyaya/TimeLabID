<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabSchedule extends Model
{
    protected $fillable = [
        'department_id',
        'room_id',
        'activity_id',
        'category',
        'date',
        'start_time',
        'end_time',
        'booked_by',
        'status',
        'notes',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class, 'schedule_id');
    }
}
