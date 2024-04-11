@extends('layouts.app')
@section('title', 'Edit Jadwal Tayang')

@section('main')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Jadwal Tayang</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/jadwal-tayang') }}">Jadwal Tayang</a></li>
        <li class="breadcrumb-item active">Edit Data</li>
    </ol>
    <div class="card mb-4 col-6">
        <div class="card-body">
            <form method="post" action="{{ url('/jadwal-tayang/update') }}"> @csrf
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Teater</label>
                    <div class="col-sm-9">
                        <select name="id_teater" class="form-select">
                            <option value="{{ $data->id_teater }}">{{ $data->nama_teater }}</option>
                            @foreach($teater as $t)
                                <option value="{{ $t->id }}">{{ $t->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Film</label>
                    <div class="col-sm-9">
                        <select name="id_film" class="form-select">
                            <option value="{{ $data->id_film }}">{{ $data->judul }}</option>
                            @foreach ($film as $f)
                                <option value="{{ $f->id }}">{{ $f->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="tanggal" value="{{ $data->tanggal }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Jam</label>
                    <div class="col-sm-9">
                        <input type="time" class="form-control" name="jam_mulai" value="{{ $data->jam_mulai }}" required>
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