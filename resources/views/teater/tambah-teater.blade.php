@extends('layouts.app')
@section('title', 'Tambah Teater')

@section('main')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Teater</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/teater') }}">Teater</a></li>
        <li class="breadcrumb-item active">Tambah Data</li>
    </ol>
    <div class="card mb-4 col-6">
        <div class="card-body">
            <form method="post" action="{{ url('/teater/simpan') }}"> @csrf
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select name="status" class="form-select">
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