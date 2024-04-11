@extends('layouts.app')
@section('title', 'Data Jadwal Tayang')

@section('main')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Jadwal Tayang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Jadwal Tayang</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h5 class="m-0">Daftar Jadwal Tayang</h5>
            <a class="btn btn-primary" href="{{ url('/jadwal-tayang/tambah') }}">Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Teater</th>
                        <th>Film</th>
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data))
                    @php($no = 1)
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama_teater }}</td>
                        <td>{{ $d->judul }}</td>
                        <td>{{ $d->tanggal }}</td>
                        <td>{{ date('H:i', strtotime($d->jam_mulai)) }}</td>
                        <td>{{ date('H:i', strtotime($d->jam_selesai)) }}</td>
                        <td class="text-center">
                            <a onclick="confirm('Yakin Menghapus?') ? window.location.href='/jadwal-tayang/hapus/{{ $d->id }}' : ''" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>    
@endsection