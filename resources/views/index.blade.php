@extends('layouts.app')

@section('title', 'Absensi Pegawai')

@section('content')
<h1 class="my-3">Daftar Absensi Pegawai</h1>

<div class="d-flex justify-content-center gap-3 mb-3">
    <count-card-component title="Absen" :count="absenCount"></count-card-component>
    <count-card-component title="Hadir" :count="hadirCount"></count-card-component>
    <count-card-component title="Pulang" :count="pulangCount"></count-card-component>
</div>

@auth
<!-- <a href="{{ route('pegawai.create') }}" class="btn btn-success mb-3"> Tambah Pegawai</a> -->
<a-btn-component href="{{ route('pegawai.create') }}">Tambah Pegawai</a-btn-component>
@endauth

<p class="mx-2 my-3 h5">Hari, Tanggal : {{ now()->locale('id')->translatedFormat('l, d F Y') }}</p>

<table v-if="pegawais?.length > 0" class="table table-striped mt-3 mb-3">
    <tr>
        <th>Nomor Pegawai</th>
        <th>Nama Pegawai</th>
        <th>Status Kehadiran</th>
        <th>Jam Hadir</th>
        <th>Jam Pulang</th>
        <th>Keterangan</th>
        @auth
        <th>Aksi</th>
        <th>Kehadiran</th>
        @endauth
    </tr>
    <tr v-for="pegawai in pegawais">
        <td>@{{ pegawai.no_pegawai }}</td>
        <td>@{{ pegawai.nama_pegawai }}</td>
        <td>@{{ pegawai.status_kehadiran }}</td>
        <td>@{{ formatTime(pegawai.waktu_hadir) }}</td>
        <td>@{{ formatTime(pegawai.waktu_pulang) }}</td>
        <td>@{{ pegawai.keterangan }}</td>
        @auth
        <td>
            <div class="d-flex justify-content-center gap-1">
            <!-- <a :href="`/pegawai/${pegawai.id}/edit`" class="btn btn-info me-2">Edit</a> -->
            <a-btn-component :href="`/pegawai/${pegawai.id}/edit`">Edit</a-btn-component>
            <form :action="`/pegawai/${pegawai.id}`" method="POST">
                @csrf
                @method('DELETE')
                <btn-component type="submit" @click="confirmDelete" variant="danger">
                    Hapus
                </btn-component>
            </form>
            </div>
        </td>
        <td>
            <div class="d-flex justify-content-center gap-1">
            <btn-component @click="absen(pegawai)">Absen</btn-component>
            <btn-component @click="hadir(pegawai)">Hadir</btn-component>
            <btn-component @click="pulang(pegawai)">Pulang</btn-component>
            </div>
        </td>
        @endauth
    </tr>
</table>

<p v-else class="mt-3 mb-3">Data Tidak Tersedia</p>
@endsection