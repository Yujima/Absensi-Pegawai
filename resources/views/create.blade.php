@extends('layouts.app')

@section('title', 'Tambah Data Pegawai')

@section('content')
<h1 class="my-3">Tambah Data Pegawai</h1>
<form action="{{ route('pegawai.store') }}" method="post">
    @csrf
    <input-component for="nama_pegawai" name="nama_pegawai" id="nama_pegawai">Nama Pegawai</input-component>
    <btn-component type="submit">Tambah</btn-component>
</form>
@endsection