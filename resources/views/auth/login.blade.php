@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('login.process') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" class="w-full mb-4 p-2 border rounded">
        <input type="password" name="password" placeholder="Password" class="w-full mb-4 p-2 border rounded">
        <button type="submit" class="w-full bg-primary text-white py-2 rounded hover:bg-primary-dark">Login</button>
    </form>
@endsection
