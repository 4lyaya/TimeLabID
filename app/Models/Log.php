<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'schedule_id',
        'user_id',
        'action',
        'details',
    ];

    public function schedule()
    {
        return $this->belongsTo(LabSchedule::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
