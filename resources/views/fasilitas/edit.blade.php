@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Edit Fasilitas'])

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Form Edit Fasilitas</h6>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('fasilitas.update', $fasilitas->id_fasilitas) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <select name="fk_id_lokasi" class="form-control" required>
                                        <option value="">-- Pilih Lokasi --</option>
                                        @foreach($lokasi as $l)
                                            <option value="{{ $l->id_lokasi }}" {{ $fasilitas->fk_id_lokasi == $l->id_lokasi ? 'selected' : '' }}>
                                                {{ $l->nama_lokasi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Fasilitas</label>
                                    <input type="text" name="nama_fasilitas" value="{{ $fasilitas->nama_fasilitas }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Upload Gambar Baru (Opsional)</label>
                                    <input type="file" name="gambar[]" class="form-control" accept="image/*" multiple>
                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                                </div>
                            </div>
                            <div class="col-12">
                                <label>Gambar Lama</label>
                                <div class="row">
                                    @foreach($fasilitas->gambarFasilitas as $gambar)
                                        <div class="col-md-3">
                                            <img src="{{ asset('storage/' . $gambar->gambar) }}" class="img-fluid rounded mb-2" alt="Gambar Fasilitas">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-4">
                        <button class="btn btn-primary btn-sm" type="submit">Update</button>
                        <a href="{{ route('fasilitas.layout') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
