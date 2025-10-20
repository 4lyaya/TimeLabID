@extends('layouts.admin')

@section('title', 'Jadwal Lab')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-primary">Jadwal Lab</h1>
        <a href="{{ route('admin.schedules.create') }}"
            class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Tambah Jadwal</a>
    </div>

    <table class="w-full bg-white shadow rounded text-left">
        <thead>
            <tr class="border-b">
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Kegiatan</th>
                <th class="px-4 py-2">Jurusan</th>
                <th class="px-4 py-2">Lab</th>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Jam</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $schedule->activity->name }}</td>
                    <td class="px-4 py-2">{{ $schedule->department->name }}</td>
                    <td class="px-4 py-2">{{ $schedule->room->name }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($schedule->date)->translatedFormat('d F Y') }}</td>
                    <td class="px-4 py-2">{{ $schedule->start_time }} - {{ $schedule->end_time }}</td>
                    <td class="px-4 py-2">{!! lab_status_badge($schedule->status) !!}</td>
                    <td class="px-4 py-2 flex gap-2">
                        <form action="{{ route('admin.schedules.destroy', $schedule) }}" method="POST"
                            onsubmit="return confirm('Hapus jadwal ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
