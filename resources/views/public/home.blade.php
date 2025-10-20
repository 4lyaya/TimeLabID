@extends('layouts.public')

@section('title', 'Jadwal Lab - Home')

@section('content')
    <h2 class="text-2xl font-bold mb-4 text-primary">Jadwal Hari Ini</h2>

    <div class="mb-4 flex gap-2">
        <form action="{{ route('public.search') }}" method="GET" class="flex gap-2">
            <input type="text" name="q" placeholder="Cari..." class="border p-2 rounded flex-1">
            <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Cari</button>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @forelse($schedules as $schedule)
            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-bold text-lg">{{ $schedule->activity->name }}</h3>
                <p>Jurusan: {{ $schedule->department->name }}</p>
                <p>Lab: {{ $schedule->room->name }}</p>
                <p>Tanggal: {{ \Carbon\Carbon::parse($schedule->date)->translatedFormat('d F Y') }}</p>
                <p>Jam: {{ $schedule->start_time }} - {{ $schedule->end_time }}</p>
                <p>Status: {!! lab_status_badge($schedule->status) !!}</p>
            </div>
        @empty
            <p class="text-gray-500">Tidak ada jadwal hari ini.</p>
        @endforelse
    </div>
@endsection
