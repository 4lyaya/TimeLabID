@extends('layouts.admin')

@section('title', 'Lab')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-primary">Daftar Lab</h1>
        <a href="{{ route('admin.rooms.create') }}"
            class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Tambah Lab</a>
    </div>

    <table class="w-full bg-white shadow rounded text-left">
        <thead>
            <tr class="border-b">
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Nama Lab</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $room->name }}</td>
                    <td class="px-4 py-2 flex gap-2">
                        <a href="{{ route('admin.rooms.edit', $room) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.rooms.destroy', $room) }}" method="POST"
                            onsubmit="return confirm('Hapus lab ini?')">
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
