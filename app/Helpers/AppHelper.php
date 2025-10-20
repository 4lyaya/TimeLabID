<?php

use Carbon\Carbon;
use App\Models\LabSchedule;

if (!function_exists('format_time')) {
    function format_time($time)
    {
        return Carbon::parse($time)->format('H:i');
    }
}

if (!function_exists('format_date')) {
    function format_date($date)
    {
        return Carbon::parse($date)->locale('id')->isoFormat('dddd, D MMMM Y');
    }
}

if (!function_exists('is_lab_available')) {
    function is_lab_available($room_id, $date, $start_time, $end_time)
    {
        return !LabSchedule::where('room_id', $room_id)
            ->where('date', $date)
            ->where(function ($q) use ($start_time, $end_time) {
                $q->whereBetween('start_time', [$start_time, $end_time])
                    ->orWhereBetween('end_time', [$start_time, $end_time]);
            })
            ->exists();
    }
}

if (!function_exists('update_lab_status')) {
    function update_lab_status()
    {
        $now = Carbon::now('Asia/Jakarta');

        LabSchedule::where('status', 'aktif')
            ->where(function ($q) use ($now) {
                $q->where('end_time', '<', $now->format('H:i'))
                    ->orWhere('date', '<', $now->toDateString());
            })
            ->update(['status' => 'selesai']);
    }
}

if (!function_exists('lab_status_badge')) {
    function lab_status_badge($status)
    {
        return match ($status) {
            'aktif' => '<span class="px-2 py-1 rounded bg-green-500 text-white text-xs">Aktif</span>',
            'selesai' => '<span class="px-2 py-1 rounded bg-gray-500 text-white text-xs">Selesai</span>',
            'pending' => '<span class="px-2 py-1 rounded bg-yellow-500 text-white text-xs">Pending</span>',
            default => '<span class="px-2 py-1 rounded bg-red-500 text-white text-xs">Tidak Diketahui</span>',
        };
    }
}
