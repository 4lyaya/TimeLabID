<?php

namespace App\Http\Controllers;

use App\Models\LabSchedule;
use App\Models\Room;
use App\Models\Department;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $today = now()->format('Y-m-d');
        $schedules = LabSchedule::with(['room', 'department', 'activity'])
            ->where('date', $today)
            ->orderBy('start_time')
            ->get();

        $departments = Department::all();
        $rooms = Room::all();

        return view('public.home', compact('schedules', 'departments', 'rooms'));
    }

    public function byDepartment($slug)
    {
        $department = Department::where('slug', $slug)->firstOrFail();
        $schedules = LabSchedule::with(['room', 'activity'])
            ->where('department_id', $department->id)
            ->orderBy('date', 'desc')
            ->get();

        return view('public.department', compact('department', 'schedules'));
    }

    public function byRoom($id)
    {
        $room = Room::findOrFail($id);
        $schedules = LabSchedule::with(['department', 'activity'])
            ->where('room_id', $room->id)
            ->orderBy('date', 'desc')
            ->get();

        return view('public.room', compact('room', 'schedules'));
    }

    public function search(Request $request)
    {
        $keyword = $request->get('q');
        $schedules = LabSchedule::with(['room', 'department', 'activity'])
            ->whereHas('room', function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%");
            })
            ->orWhereHas('department', function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%");
            })
            ->orderBy('date', 'desc')
            ->get();

        return view('public.search', compact('schedules', 'keyword'));
    }
}
