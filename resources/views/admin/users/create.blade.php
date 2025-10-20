@extends('layouts.admin')

@section('title', 'Tambah User')

@section('content')
    <h1 class="text-2xl font-bold text-primary mb-4">Tambah User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" class="bg-white p-4 rounded shadow">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Nama</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Password</label>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Role</label>
            <select name="role" class="w-full border p-2 rounded" required>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
        </div>
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded hover:bg-primary-dark">Simpan</button>
    </form>
@endsection
