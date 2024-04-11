@extends('layouts.app')
@section('title', 'Edit Harga')

@section('main')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Harga</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/Harga') }}">Harga</a></li>
        <li class="breadcrumb-item active">Edit Harga</li>
    </ol>
    <div class="row">
        <div class="card mb-4 col-4">
            <div class="card-body">
                <form method="post" action="{{ url('/harga/update') }}"> @csrf
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Senin</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="hari[]" value="{{ $data[0]->harga }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Selasa</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="hari[]" value="{{ $data[1]->harga }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Rabu</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="hari[]" value="{{ $data[2]->harga }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Kamis</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="hari[]" value="{{ $data[3]->harga }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Jumat</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="hari[]" value="{{ $data[4]->harga }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Sabtu</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="hari[]" value="{{ $data[5]->harga }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Minggu</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="hari[]" value="{{ $data[6]->harga }}" required>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label"></label>
                        <div class="col-sm-7 text-end">
                            <button type="submit" class="btn btn-success">Simpan</button>    
                        </div>
                    </div>
                            
                </form>
            </div>
        </div>
    </div>
</div>  
@endsection