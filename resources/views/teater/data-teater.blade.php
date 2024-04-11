@extends('layouts.app')
@section('title', 'Data Teater')

@section('main')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Teater</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Teater</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h5 class="m-0">Daftar Teater</h5>
            <a class="btn btn-primary" href="{{ url('/teater/tambah') }}">Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data))
                    @php($no = 1)
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->status }}</td>
                        <td class="text-center">
                            <a href="{{ url('/teater/detail/'.$d->id) }}" class="btn btn-sm btn-info"><i class="bi bi-clipboard"></i></a>
                            <a href="{{ url('/teater/edit/'.$d->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <a onclick="confirm('Yakin Menghapus?') ? window.location.href='/teater/hapus/{{ $d->id }}' : ''" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
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