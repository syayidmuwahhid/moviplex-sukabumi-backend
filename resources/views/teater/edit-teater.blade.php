@extends('layouts.app')
@section('title', 'Tambah Teater')

@section('main')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Teater</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/teater') }}">Teater</a></li>
        <li class="breadcrumb-item active">Edit Data</li>
    </ol>
    <div class="card mb-4 col-6">
        <div class="card-body">
            <form method="post" action="{{ url('/teater/update') }}"> @csrf
                <input type="hidden" name="id" value="{{ $data->id }}"/>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" value="{{ $data->nama }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Jumlah Baris</label>
                    <div class="col-sm-9">
                        <select name="status" class="form-select">
                            <option value="{{ $data->status }}" >{{ $data->status }}</option>
                            <option value="aktif">aktif</option>
                            <option value="tidak aktif">tidak aktif</option>
                        </select>    
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-12 text-end">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
                        
            </form>
        </div>
    </div>
</div>  
@endsection