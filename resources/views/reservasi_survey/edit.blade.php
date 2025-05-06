@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Edit Reservasi Lokasi'])

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Form Edit Reservasi Lokasi</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('reservasi_survey.update', $survey->id_reservasi) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <select name="fk_id_lokasi" class="form-control" required>
                                        <option value="">-- Pilih Lokasi --</option>
                                        @foreach($lokasi as $l)
                                            <option value="{{ $l->id_lokasi }}" {{ $survey->lokasi->id_lokasi == $l->id_lokasi ? 'selected' : '' }}>
                                                {{ $l->nama_lokasi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Pemesan</label>
                                    <input type="text" name="nama_pemesan" class="form-control" value="{{ $survey->nama_pemesan }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="text" name="nomor_telepon" class="form-control" value="{{ $survey->nomor_telepon }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $survey->email }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Survey</label>
                                    <input type="date" name="tanggal_survey" class="form-control" value="{{ $survey->tanggal_survey }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jam Survey</label>
                                    <input type="time" name="jam_survey" class="form-control" value="{{ $survey->jam_survey }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <textarea name="catatan" class="form-control" rows="3">{{ $survey->catatan }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="Pending" {{ $survey->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Dikonfirmasi" {{ $survey->status == 'dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi</option>
                                        <option value="Dibatalkan" {{ $survey->status == 'batal' ? 'selected' : '' }}>Batal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-4">
                        <button class="btn btn-primary btn-sm" type="submit">Perbarui</button>
                        <a href="{{ route('reservasi_survey.layout') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
