@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Tambah Tipe Rumah'])

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Form Tambah Tipe Rumah</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('tipe_rumah.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <select name="fk_id_lokasi" class="form-control" required>
                                        <option value="">-- Pilih Lokasi --</option>
                                        @foreach($lokasi as $l)
                                            <option value="{{ $l->id_lokasi }}">{{ $l->nama_lokasi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Tipe Rumah</label>
                                    <input type="text" name="nama_tipe" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Luas Bangunan (m²)</label>
                                    <input type="number" name="luas_bangunan" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Luas Tanah (m²)</label>
                                    <input type="number" name="luas_tanah" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" name="harga" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Jumlah Kamar</label>
                                    <input type="number" name="jumlah_kamar" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Kamar Mandi</label>
                                    <input type="number" name="jumlah_kamar_mandi" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Fasilitas Unggulan</label>
                                    <textarea name="fasilitas_unggulan" rows="3" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Promo</label>
                                    <select name="is_promo" class="form-control" required>
                                        <option value="0">Tidak</option>
                                        <option value="1">Ya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Upload Gambar Rumah</label>
                                    <input type="file" name="gambar[]" class="form-control" accept="image/*" multiple required>
                                    <small class="text-muted">Dapat memilih lebih dari satu gambar</small>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-4">
                        <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                        <a href="{{ route('tipe_rumah.layout') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
