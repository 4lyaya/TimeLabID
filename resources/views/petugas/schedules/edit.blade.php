@extends('layouts.petugas')

@section('title', 'Edit Jadwal Lab')

@section('content')
    <h1 class="text-2xl font-bold text-primary mb-4">Edit Jadwal Lab</h1>

    <form action="{{ route('petugas.schedules.update', $schedule) }}" method="POST" class="bg-white p-4 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1">Kegiatan</label>
            <select name="activity_id" class="w-full border p-2 rounded" required>
                @foreach ($activities as $activity)
                    <option value="{{ $activity->id }}" {{ $schedule->activity_id == $activity->id ? 'selected' : '' }}>
                        {{ $activity->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Jurusan</label>
            <select name="department_id" class="w-full border p-2 rounded" required>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ $schedule->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Lab</label>
            <select name="room_id" class="w-full border p-2 rounded" required>
                @foreach ($rooms as $room)
                    <option value="{{ $room->id }}" {{ $schedule->room_id == $room->id ? 'selected' : '' }}>
                        {{ $room->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tanggal</label>
            <input type="date" name="date" value="{{ $schedule->date }}" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4 flex gap-2">
            <div class="flex-1">
                <label class="block mb-1">Jam Mulai</label>
                <input type="time" name="start_time" value="{{ $schedule->start_time }}"
                    class="w-full border p-2 rounded" required>
            </div>
            <div class="flex-1">
                <label class="block mb-1">Jam Selesai</label>
                <input type="time" name="end_time" value="{{ $schedule->end_time }}" class="w-full border p-2 rounded"
                    required>
            </div>
        </div>
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Update</button>
    </form>
@endsection
