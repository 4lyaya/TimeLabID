<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LabSchedule;
use App\Models\Department;
use App\Models\Room;
use App\Models\Activity;
use Illuminate\Http\Request;

class LabScheduleController extends Controller
{
    public function index()
    {
        $schedules = LabSchedule::with(['department', 'room', 'activity'])->orderBy('date', 'desc')->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $departments = Department::all();
        $rooms = Room::all();
        $activities = Activity::all();
        return view('admin.schedules.create', compact('departments', 'rooms', 'activities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
            'room_id' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $exists = LabSchedule::where('room_id', $request->room_id)
            ->where('date', $request->date)
            ->where(function ($q) use ($request) {
                $q->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })->exists();

        if ($exists) {
            return back()->withErrors(['schedule' => 'Waktu tersebut sudah terpakai']);
        }

        LabSchedule::create($request->all());
        return redirect()->route('admin.schedules.index');
    }

    public function destroy(LabSchedule $schedule)
    {
        $schedule->delete();
        return back();
    }
}
