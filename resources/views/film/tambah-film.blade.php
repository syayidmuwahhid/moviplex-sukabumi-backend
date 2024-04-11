@extends('layouts.app')
@section('title', 'Tambah Data Film')

@section('main')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Data Film</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/film') }}">Film</a></li>
        <li class="breadcrumb-item active">Tambah Data</li>
    </ol>
    <div class="card mb-4">
        <div class="card-body">
            <form method="post" action="{{ url('/film/simpan') }}" enctype="multipart/form-data"> @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="judul" value="{{ old('judul') }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kategori" value="{{ old('kategori') }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Durasi</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="durasi" value="{{ old('durasi') }}" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control-plaintext" value="Menit" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Rating Usia</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="rating_usia" value="{{ old('rating_usia') }}" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control-plaintext" value="Tahun" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Sinopsis</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="sinopsis" rows="5">{{ old('sinopsis" rows="5">') }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="foto" value="{{ old('foto') }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Trailer</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="trailer" placeholder="Masukan Link Youtube value="{{ old('trailer" placeholder="Masukan Link Youtub') }}" Trailer">
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Produser</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="produser" value="{{ old('produser') }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Sutradara</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="sutradara" value="{{ old('sutradara') }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Penulis</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="penulis" value="{{ old('penulis') }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Produksi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="produksi" value="{{ old('produksi') }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Cast</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="cast" value="{{ old('cast') }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Tanggal Tayang</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal_awal" value="{{ old('tanggal_awal') }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Tanggal Selesai</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal_akhir" value="{{ old('tanggal_akhir') }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row"></div>
                        <div class="mb-3 row">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>  
@endsection