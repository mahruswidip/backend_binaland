@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Detail Artikel'])

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                @if($artikel->gambar)
                    <img src="{{ asset('storage/' . $artikel->gambar) }}" class="card-img-top rounded-top" alt="Gambar Artikel">
                @endif
                <div class="card-body">
                    <h4 class="text-center card-title">{{ $artikel->judul }}</h4>
                    <p class="text-muted mb-1"><strong>Kategori:</strong> {{ $artikel->kategori }}</p>
                    <p class="text-muted mb-1"><strong>Company:</strong> {{ $artikel->company }}</p>
                    <p class="text-muted mb-3"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($artikel->tanggal)->translatedFormat('d F Y') }}</p>
                    <p class="card-text" style="white-space: pre-line;">{{ $artikel->isi }}</p>
                </div>
                <div class="card-footer text-end bg-white">
                    <a href="{{ route('artikel.layout') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
