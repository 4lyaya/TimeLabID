<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\LabSchedule;
use App\Models\Room;
use App\Models\Department;
use App\Models\Activity;
use Illuminate\Http\Request;

class LabScheduleController extends Controller
{
    public function index()
    {
        $schedules = LabSchedule::with(['room', 'department', 'activity'])
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        return view('petugas.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $rooms = Room::all();
        $departments = Department::all();
        $activities = Activity::all();

        return view('petugas.schedules.create', compact('rooms', 'departments', 'activities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'department_id' => 'required|exists:departments,id',
            'room_id' => 'required|exists:lab_rooms,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        // Cek konflik jadwal
        $conflict = LabSchedule::where('room_id', $request->room_id)
            ->where('date', $request->date)
            ->where(function ($q) use ($request) {
                $q->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })->exists();

        if ($conflict) {
            return back()->withErrors('Lab sudah dijadwalkan pada waktu tersebut.');
        }

        LabSchedule::create($request->all());

        return redirect()->route('petugas.schedules.index')->with('success', 'Jadwal berhasil dibuat.');
    }

    public function edit(LabSchedule $schedule)
    {
        $rooms = Room::all();
        $departments = Department::all();
        $activities = Activity::all();

        return view('petugas.schedules.edit', compact('schedule', 'rooms', 'departments', 'activities'));
    }

    public function update(Request $request, LabSchedule $schedule)
    {
        $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'department_id' => 'required|exists:departments,id',
            'room_id' => 'required|exists:lab_rooms,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $conflict = LabSchedule::where('room_id', $request->room_id)
            ->where('date', $request->date)
            ->where('id', '!=', $schedule->id)
            ->where(function ($q) use ($request) {
                $q->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })->exists();

        if ($conflict) {
            return back()->withErrors('Lab sudah dijadwalkan pada waktu tersebut.');
        }

        $schedule->update($request->all());

        return redirect()->route('petugas.schedules.index')->with('success', 'Jadwal berhasil diupdate.');
    }

    public function destroy(LabSchedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('petugas.schedules.index')->with('success', 'Jadwal berhasil dihapus.');
    }

    public function updateStatus(LabSchedule $schedule)
    {
        $now = now()->format('H:i:s');
        if ($now >= $schedule->start_time && $now <= $schedule->end_time) {
            $schedule->update(['status' => 'dipakai']);
        } else {
            $schedule->update(['status' => 'tersedia']);
        }

        return back()->with('success', 'Status jadwal diperbarui.');
    }
}
