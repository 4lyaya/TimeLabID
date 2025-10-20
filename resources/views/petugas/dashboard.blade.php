@extends('layouts.petugas')

@section('title', 'Dashboard Petugas')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-primary">Dashboard Petugas</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-bold text-lg">Total Jadwal Hari Ini</h2>
            <p class="text-2xl">{{ $todaySchedules->count() }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-bold text-lg">Lab Tersedia</h2>
            <p class="text-2xl">{{ $availableRooms }}</p>
        </div>
    </div>
@endsection
