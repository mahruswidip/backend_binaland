@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Edit Artikel'])

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Artikel</p>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-text"><strong>Berhasil!</strong> {{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('artikel.update', $artikel->id_artikel) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Company</label>
                                    <select name="company" class="form-control" required>
                                        <option value="">-- Pilih Company --</option>
                                        <option value="Binaland" {{ $artikel->company == 'Binaland' ? 'selected' : '' }}>Binaland</option>
                                        <option value="Superland" {{ $artikel->company == 'Superland' ? 'selected' : '' }}>Superland</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Kategori</label>
                                    <input type="text" name="kategori" class="form-control" value="{{ $artikel->kategori }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Judul</label>
                                    <input type="text" name="judul" class="form-control" value="{{ $artikel->judul }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{ $artikel->tanggal }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Isi</label>
                                    <textarea name="isi" class="form-control" rows="5" required>{{ $artikel->isi }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label">Gambar</label>
                                    <input type="file" name="gambar" class="form-control" accept="image/*">
                                    @if($artikel->gambar)
                                        <p class="mt-2">Gambar saat ini:</p>
                                        <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Gambar Artikel" width="200">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-4">
                        <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                        <a href="{{ route('artikel.layout') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
