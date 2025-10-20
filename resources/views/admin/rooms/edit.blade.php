@extends('layouts.admin')

@section('title', 'Edit Lab')

@section('content')
    <h1 class="text-2xl font-bold text-primary mb-4">Edit Lab</h1>

    <form action="{{ route('admin.rooms.update', $room) }}" method="POST" class="bg-white p-4 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1">Nama Lab</label>
            <input type="text" name="name" value="{{ $room->name }}" class="w-full border p-2 rounded" required>
        </div>
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Update</button>
    </form>
@endsection
