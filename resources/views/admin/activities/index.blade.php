@extends('layouts.admin')

@section('title', 'Kegiatan')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-primary">Daftar Kegiatan</h1>
        <a href="{{ route('admin.activities.create') }}"
            class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Tambah Kegiatan</a>
    </div>

    <table class="w-full bg-white shadow rounded text-left">
        <thead>
            <tr class="border-b">
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Nama Kegiatan</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activities as $activity)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $activity->name }}</td>
                    <td class="px-4 py-2 flex gap-2">
                        <a href="{{ route('admin.activities.edit', $activity) }}"
                            class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.activities.destroy', $activity) }}" method="POST"
                            onsubmit="return confirm('Hapus kegiatan ini?')">
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
