@extends('layouts.app')
@section('title', 'Detail Transaksi')

@section('main')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Transaksi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/transaksi') }}">Transaksi</a></li>
        <li class="breadcrumb-item active">Detail Data</li>
    </ol>
    <div class="row">
        <div class="card mb-4 col-6">
            <div class="card-body">
                <form method="post"> @csrf
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">ID Transaksi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $data->id }}" required disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $data->tanggal }}" required disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Judul Film</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $data->judul }}"  required disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Tanggal Tayang</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $data->tanggal_tayang }}" required disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Jam Tayang</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $data->jam_tayang }}" required disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Teater</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{ $data->teater }}" required disabled>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="card mb-4 col-6">
            <div class="card-body">
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Harga Tiket</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $data->harga_tiket }}" vrequired disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Biaya Tambahan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $data->harga_tambahan }}" required disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Jumlah Tiket</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $data->jumlah }}" required disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Kursi dipesan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $data->kursi }}" required disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Total</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $data->total }}" required disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label">Status Pembayaran</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{ $data->status_bayar }}" required disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection