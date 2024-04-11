@extends('layouts.app')
@section('title', 'Detail Data Film')

@section('main')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Data Film</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/film') }}">Film</a></li>
        <li class="breadcrumb-item active">Detail Data</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form method="post" enctype="multipart/form-data"> @csrf
                <input type="hidden" name="id" value="{{ $data->id }}" disabled>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="judul" value="{{ $data->judul }}" required disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kategori" value="{{ $data->kategori }}" required disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Durasi</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="durasi" value="{{ $data->durasi }}" required disabled>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control-plaintext" value="Menit" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Rating Usia</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="rating_usia" value="{{ $data->rating_usia }}" required disabled>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control-plaintext" value="Tahun"/ disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Sinopsis</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="sinopsis" disabled>{{ $data->sinopsis }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <img src="{{ $data->foto }}" height="100">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Trailer</label>
                            <div class="col-sm-9">
                                <a href="{{ $data->trailer }}" class="btn btn-info">Lihat Trailer</a>    
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Produser</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="produser" value="{{ $data->produser }}" required disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Sutradara</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="sutradara" value="{{ $data->sutradara }}" required disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Penulis</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="penulis" value="{{ $data->penulis }}" required disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Produksi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="produksi" value="{{ $data->produksi }}" required disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Cast</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="cast" value="{{ $data->cast }}" required disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Tanggal Tayang</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal_awal" value="{{ $data->tanggal_awal }}" required disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Tanggal Selesai</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal_akhir" value="{{ $data->tanggal_akhir }}" required disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tanggal_akhir" value="{{ $data->status }}" required disabled>
                            </div>
                        </div>
                        <div class="mb-3 row"></div>
                        <div class="mb-3 row">
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>  
@endsection