<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\LabSchedule;
use App\Models\Room;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now()->format('Y-m-d');

        $todaySchedules = LabSchedule::with(['room', 'department'])
            ->where('date', $today)
            ->get();

        // Lab tersedia = lab yang tidak ada jadwal hari ini
        $usedRoomIds = $todaySchedules->pluck('room_id')->toArray();
        $availableRooms = Room::whereNotIn('id', $usedRoomIds)->count();

        return view('petugas.dashboard', compact('todaySchedules', 'availableRooms'));
    }
}
