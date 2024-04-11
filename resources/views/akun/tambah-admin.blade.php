@extends('layouts.app')
@section('title', 'Tambah Akun')

@section('main')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Akun Admin</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/akun/admin') }}">Akun Admin</a></li>
        <li class="breadcrumb-item active">Tambah Data</li>
    </ol>
    <div class="card mb-4 col-6">
        <div class="card-body">
            <form method="post" action="{{ url('/akun/admin/simpan') }}"> @csrf
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="password" value="{{ old('password') }}" required>
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