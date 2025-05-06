@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Detail Lokasi'])

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                @if($lokasi->gambarLokasi->isNotEmpty())
                    <div class="d-flex flex-wrap justify-content-center p-3">
                        @foreach ($lokasi->gambarLokasi as $gambar)
                            <img src="{{ asset('storage/' . $gambar->gambar) }}" class="img-thumbnail m-1" style="max-width: 200px;" alt="Gambar Lokasi">
                        @endforeach
                    </div>
                @endif
                <div class="card-body">
                    <h4 class="text-center card-title">{{ $lokasi->nama_lokasi }}</h4>
                    <p class="text-muted mb-1"><strong>Perusahaan:</strong> {{ $lokasi->company }}</p>
                    <p class="text-muted mb-1"><strong>Deskripsi:</strong></p>
                    <p class="card-text" style="white-space: pre-line;">{{ $lokasi->deskripsi }}</p>
                    <p class="text-muted mb-1"><strong>Provinsi:</strong> {{ $lokasi->provinsi }}</p>
                    <p class="text-muted mb-1"><strong>Kota:</strong> {{ $lokasi->kota }}</p>
                    <p class="text-muted mb-1"><strong>Kecamatan:</strong> {{ $lokasi->kecamatan }}</p>
                    <p class="text-muted mb-1"><strong>Alamat:</strong> {{ $lokasi->alamat }}</p>
                </div>
                <div class="card-footer text-end bg-white">
                    <a href="{{ route('lokasi.layout') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
