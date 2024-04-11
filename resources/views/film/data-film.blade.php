@extends('layouts.app')
@section('title', 'Data Film')

@section('main')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Film</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Film</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h5 class="m-0">Daftar Film</h5>
            <a class="btn btn-primary" href="{{ url('/film/tambah') }}">Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Rating Usia</th>
                        <th>Durasi</th>
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
                        <td><img src="{{ $d->foto }}" width="100"></td>
                        <td>{{ $d->judul }}</td>
                        <td>{{ $d->kategori }}</td>
                        <td>{{ $d->rating_usia }}+</td>
                        <td>{{ $d->durasi }} Menit</td>
                        <td>{{ $d->status }}</td>
                        <td class="text-center">
                            <a href="{{ url('/film/detail/'.$d->id) }}" class="btn btn-sm btn-info"><i class="bi bi-clipboard"></i></a>
                            <a href="{{ url('/film/edit/'.$d->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <a onclick="confirm('Yakin Menghapus?') ? window.location.href='/film/hapus/{{ $d->id }}' : ''" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
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