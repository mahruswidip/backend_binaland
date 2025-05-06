@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Edit Tipe Rumah'])

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Form Edit Tipe Rumah</h6>
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

                    <form action="{{ route('tipe_rumah.update', $tipeRumah->id_tipe_rumah) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <select name="fk_id_lokasi" class="form-control" required>
                                        <option value="">-- Pilih Lokasi --</option>
                                        @foreach($lokasi as $l)
                                            <option value="{{ $l->id_lokasi }}" {{ $tipeRumah->fk_id_lokasi == $l->id_lokasi ? 'selected' : '' }}>
                                                {{ $l->nama_lokasi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Tipe Rumah</label>
                                    <input type="text" name="nama_tipe" value="{{ $tipeRumah->nama_tipe }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Luas Bangunan (m²)</label>
                                    <input type="number" name="luas_bangunan" value="{{ $tipeRumah->luas_bangunan }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Luas Tanah (m²)</label>
                                    <input type="number" name="luas_tanah" value="{{ $tipeRumah->luas_tanah }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" name="harga" value="{{ $tipeRumah->harga }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Jumlah Kamar</label>
                                    <input type="number" name="jumlah_kamar" value="{{ $tipeRumah->jumlah_kamar }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Kamar Mandi</label>
                                    <input type="number" name="jumlah_kamar_mandi" value="{{ $tipeRumah->jumlah_kamar_mandi }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Bonus</label>
                                    <textarea name="fasilitas_unggulan" rows="3" class="form-control" required>{{ $tipeRumah->fasilitas_unggulan }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Promo</label>
                                    <select name="is_promo" class="form-control" required>
                                        <option value="0" {{ $tipeRumah->is_promo == 0 ? 'selected' : '' }}>Tidak</option>
                                        <option value="1" {{ $tipeRumah->is_promo == 1 ? 'selected' : '' }}>Ya</option>
                                    </select>
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
                                    @foreach($tipeRumah->gambarRumah as $gambar)
                                        <div class="col-md-3">
                                            <img src="{{ asset('storage/' . $gambar->gambar) }}" class="img-fluid rounded mb-2" alt="Gambar Rumah">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-4">
                        <button class="btn btn-primary btn-sm" type="submit">Update</button>
                        <a href="{{ route('tipe_rumah.layout') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
