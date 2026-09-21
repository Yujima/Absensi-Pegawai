@extends('layouts.app')

@section('title', 'Log-In Admin')

@section('content')
<h1 class="my-3">Log-In Admin</h1>
<form action="{{ route('login') }}" method="post">
    @csrf
    <input-component for="username" name="username" id="username">Username</input-component>
    <input-component for="password" type="password" name="password" id="password">Password</input-component>
    <btn-component type="submit">Log-In</btn-component>
</form>
@endsection