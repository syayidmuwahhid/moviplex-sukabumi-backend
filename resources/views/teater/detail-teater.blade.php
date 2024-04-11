@extends('layouts.app')
@section('title', 'Tambah Teater')

@section('main')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Teater</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/teater') }}">Teater</a></li>
        <li class="breadcrumb-item active">Detail Data</li>
    </ol>
    <div class="row">
        <div class="card mb-4 col-4">
            <div class="card-body">
                <form method="post"> @csrf
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama" value="{{ $data->nama }}" required disabled>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Status</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="baris" value="{{ $data->status }}" required disabled>
                        </div>
                    </div>
                            
                </form>
            </div>
        </div>
        <div class="card mb-4 col-8">
            <div class="card-body">
                <h5 class="text-center">Denah Teater</h5><br>
                @php($abc = ord('A'))
                @for($i = 1; $i <= 5; $i++)
                <div class="row mt-1">
                    <div class="col-sm-1 bg-info text-center">{{ chr($abc) }}</div>
                    <div class="col-sm-10">
                        <div class="row">
                            @for($j = 1; $j <= 11; $j++)
                                <div class="col-sm-1 bg-light me-1 text-center">{{ $j }}</div>
                            @endfor
                        </div>
                    </div>
                    <div class="col-sm-1 bg-info text-center">{{ chr($abc) }}</div>
                    
                </div>
                @php($abc++)
            @endfor
            </div>
        </div>
    </div>
</div>  
@endsection