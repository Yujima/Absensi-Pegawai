@extends('layouts.app')

@section('title', 'Ubah Data Pegawai')

@section('content')
<h1 class="my-3">Ubah Data Pegawai</h1>
<form action="{{ route('pegawai.update', $pegawai->id) }}" method="post">
    @csrf
    @method('PUT')
    <input-component for="nama_pegawai" name="nama_pegawai" id="nama_pegawai" value="{{ old('nama_pegawai', $pegawai->nama_pegawai) }}">Nama Pegawai</input-component>
    <input-component for="keterangan" name="keterangan" id="keterangan" value="{{ old('keterangan', $pegawai->keterangan) }}">Keterangan</input-component>
    <btn-component type="submit">Ubah</btn-component>
</form>
@endsection