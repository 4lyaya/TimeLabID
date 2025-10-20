<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Department;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('department')->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.rooms.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'department_id' => 'required']);
        Room::create($request->all());
        return redirect()->route('admin.rooms.index');
    }

    public function edit(Room $room)
    {
        $departments = Department::all();
        return view('admin.rooms.edit', compact('room', 'departments'));
    }

    public function update(Request $request, Room $room)
    {
        $room->update($request->all());
        return redirect()->route('admin.rooms.index');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return back();
    }
}
