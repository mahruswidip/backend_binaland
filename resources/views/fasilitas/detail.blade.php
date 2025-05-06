@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Detail Fasilitas'])

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                @if($fasilitas->gambarFasilitas->isNotEmpty())
                    <div class="d-flex flex-wrap justify-content-center p-3">
                        @foreach ($fasilitas->gambarFasilitas as $gambar)
                            <img src="{{ asset('storage/' . $gambar->gambar) }}" class="img-thumbnail m-1" style="max-width: 200px;" alt="Gambar Fasilitas">
                        @endforeach
                    </div>
                @endif
                <div class="card-body">
                    <h4 class="text-center card-title">{{ $fasilitas->nama_fasilitas }}</h4>
                    <p class="text-muted mb-1"><strong>Lokasi:</strong> {{ $fasilitas->lokasi->nama_lokasi ?? '-' }}</p>
                </div>
                <div class="card-footer text-end bg-white">
                    <a href="{{ route('fasilitas.layout') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
