@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Detail Tipe Rumah'])

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                @if($tipeRumah->gambarRumah->isNotEmpty())
                    <div class="d-flex flex-wrap justify-content-center p-3">
                        @foreach ($tipeRumah->gambarRumah as $gambar)
                            <img src="{{ asset('storage/' . $gambar->gambar) }}" class="img-thumbnail m-1" style="max-width: 200px;" alt="Gambar Rumah">
                        @endforeach
                    </div>
                @endif
                <div class="card-body">
                    <h4 class="text-center card-title">{{ $tipeRumah->nama_tipe }}</h4>
                    <p class="text-muted mb-1"><strong>Lokasi:</strong> {{ $tipeRumah->lokasi->nama_lokasi ?? '-' }}</p>
                    <p class="text-muted mb-1"><strong>Luas Bangunan:</strong> {{ $tipeRumah->luas_bangunan }} m²</p>
                    <p class="text-muted mb-1"><strong>Luas Tanah:</strong> {{ $tipeRumah->luas_tanah }} m²</p>
                    <p class="text-muted mb-1"><strong>Harga:</strong> Rp{{ number_format($tipeRumah->harga, 0, ',', '.') }}</p>
                    <p class="text-muted mb-1"><strong>Jumlah Kamar:</strong> {{ $tipeRumah->jumlah_kamar }}</p>
                    <p class="text-muted mb-1"><strong>Jumlah Kamar Mandi:</strong> {{ $tipeRumah->jumlah_kamar_mandi }}</p>
                    <p class="text-muted mb-1"><strong>Fasilitas Unggulan:</strong></p>
                    <p class="card-text" style="white-space: pre-line;">{{ $tipeRumah->fasilitas_unggulan }}</p>
                    <p class="text-muted mb-1"><strong>Status Promo:</strong> {{ $tipeRumah->is_promo ? 'Ya' : 'Tidak' }}</p>
                </div>
                <div class="card-footer text-end bg-white">
                    <a href="{{ route('tipe_rumah.layout') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
