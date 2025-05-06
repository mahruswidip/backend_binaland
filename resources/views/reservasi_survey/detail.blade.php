@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Detail Reservasi Survey'])

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    @if($reservasi->reservasiLokasi && $reservasi->reservasiLokasi->lokasi->gambarLokasi->isNotEmpty())
                        <div class="d-flex flex-wrap justify-content-center p-3">
                            @foreach ($reservasi->reservasiLokasi->lokasi->gambarLokasi as $gambar)
                                <img src="{{ asset('storage/' . $gambar->gambar) }}" class="img-thumbnail m-1" style="max-width: 200px;" alt="Gambar Lokasi">
                            @endforeach
                        </div>
                    @endif
                    <h4 class="text-center card-title">Reservasi Oleh {{ $reservasi->nama_pemesan }}</h4>
                    <p class="text-muted mb-1"><strong>Data Lokasi</strong></p>
                    <p class="text-muted mb-1"><strong>Lokasi:</strong> {{ $reservasi->reservasiLokasi->lokasi->nama_lokasi ?? '-' }}</p>
                    <p class="text-muted mb-1"><strong>Alamat Lokasi:</strong> {{ $reservasi->reservasiLokasi->lokasi->alamat ?? '-' }}</p>
                    <br>
                    <p class="text-muted mb-1"><strong>Data Pemesan</strong></p>
                    <p class="text-muted mb-1"><strong>No. HP:</strong> {{ $reservasi->nomor_telepon }}</p>
                    <p class="text-muted mb-1"><strong>Email:</strong> {{ $reservasi->email }}</p>
                    <p class="text-muted mb-1"><strong>Tanggal Survey:</strong> {{ \Carbon\Carbon::parse($reservasi->tanggal_survey)->format('d-m-Y') }}</p>
                    <p class="text-muted mb-1"><strong>Jam Survey:</strong> {{ $reservasi->jam_survey }}</p>
                    <p class="text-muted mb-1"><strong>Catatan Tambahan:</strong></p>
                    <p class="card-text" style="white-space: pre-line;">{{ $reservasi->catatan }}</p>
                </div>

                <div class="card-footer text-end bg-white">
                    <a href="{{ route('reservasi_survey.layout') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
