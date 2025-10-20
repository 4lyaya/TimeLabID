<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Room;
use App\Models\LabSchedule;

class DashboardController extends Controller
{
    public function index()
    {
        $departments = Department::count();
        $rooms = Room::count();
        $schedules = LabSchedule::count();

        return view('admin.dashboard', compact('departments', 'rooms', 'schedules'));
    }
}
