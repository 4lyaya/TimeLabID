@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-primary">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-bold text-lg">Total Jurusan</h2>
            <p class="text-2xl">{{ \App\Models\Department::count() }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-bold text-lg">Total Lab</h2>
            <p class="text-2xl">{{ \App\Models\Room::count() }}</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h2 class="font-bold text-lg">Total User</h2>
            <p class="text-2xl">{{ \App\Models\User::count() }}</p>
        </div>
    </div>
@endsection
