@extends('layouts.app')
@section('title', 'Data Akun Admin')

@section('main')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Akun Admin</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Akun Admin</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h5 class="m-0">Daftar Akun</h5>
            <a class="btn btn-primary" href="{{ url('/akun/admin/tambah') }}">Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal dibuat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data))
                    @php($no = 1)
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->email }}</td>
                        <td>{{ $d->created_at }}</td>
                        <td class="text-center">
                            <a href="{{ url('/akun/admin/edit/'.$d->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <a onclick="confirm('Yakin Menghapus?') ? window.location.href='/akun/hapus/{{ $d->id }}' : ''" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
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