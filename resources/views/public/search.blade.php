@extends('layouts.public')

@section('title', 'Hasil Pencarian: ' . $keyword)

@section('content')
    <h2 class="text-2xl font-bold mb-4 text-primary">Hasil Pencarian: "{{ $keyword }}"</h2>

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
            <p class="text-gray-500">Tidak ada hasil ditemukan.</p>
        @endforelse
    </div>
@endsection
