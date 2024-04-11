@extends('layouts.app')
@section('title', 'Data TTransaksi')

@section('main')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Transaksi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Transaksi</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h5 class="m-0">Daftar Transaksi</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Tanggal</th>
                        <th>Film</th>
                        <th class="text-center">Jumlah Tiket</th>
                        <th class="text-end">Total Bayar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data))
                    @php($no = 1)
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->name }} [{{ $d->email }}]</td>
                        <td>{{ $d->tanggal }}</td>
                        <td>{{ $d->judul }}</td>
                        <td class="text-center">{{ $d->jumlah }}</td>
                        <td class="text-end">Rp {{ $d->total }}</td>
                        <td class="text-center">
                            <a href="{{ url('/transaksi/detail/'.$d->id) }}" class="btn btn-sm btn-info"><i class="bi bi-clipboard"></i></a>
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