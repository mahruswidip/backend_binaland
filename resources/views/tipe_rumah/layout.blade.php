@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Tipe Rumah'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex align-items-center">
                    <h6>Data Tipe Rumah</h6>
                    <a href="{{ route('tipe_rumah.add') }}" class="btn bg-gradient-primary btn-sm ms-auto">
                        <span class="fa fa-plus">&nbsp;</span> Tambah Tipe Rumah
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive px-5 py-2">
                        <table id="dataTable-tipe" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lokasi</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Luas</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fasilitas</th>
                                    <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th> -->
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipeRumah as $tipe)
                                    <tr>
                                        <td class="text-center">{{ $tipe->lokasi->nama_lokasi }}</td>
                                        <td class="text-center">{{ $tipe->nama_tipe }}</td>
                                        <td class="text-start">
                                            {{ $tipe->luas_bangunan }} m² <br>
                                            {{ $tipe->luas_tanah }} m²
                                        </td>
                                        <td class="text-center">Rp {{ number_format($tipe->harga, 0, ',', '.') }}</td>
                                        <td class="text-start">
                                            {{ $tipe->jumlah_kamar }} Kamar<br>
                                            {{ $tipe->jumlah_kamar_mandi }} K. Mandi
                                        </td>
                                        <td class="text-start" style="white-space: pre-line;">{{ $tipe->fasilitas_unggulan }}</td>
                                        <!-- <td class="lebar-tabel text-center">
                                            <div style="max-height: 100px; overflow-y: auto;" class="d-flex flex-wrap justify-content-center">
                                                @foreach ($tipe->gambarRumah as $gambar)
                                                    <img src="{{ asset('storage/' . $gambar->gambar) }}" width="100" class="m-1 rounded">
                                                @endforeach
                                            </div>
                                        </td> -->
                                        <td class="lebar-tabel1 text-center">
                                            <a href="{{ route('tipe_rumah.edit', $tipe->id_tipe_rumah) }}" class="btn bg-gradient-info btn-sm">Edit</a>
                                            <form action="{{ route('tipe_rumah.destroy', $tipe->id_tipe_rumah) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn bg-gradient-danger btn-sm">Hapus</button>
                                            </form>
                                            <a href="{{ route('tipe_rumah.detail', $tipe->id_tipe_rumah) }}" class="btn bg-gradient-success btn-sm">Tinjau</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-between align-items-center px-5 mt-2">
                            <div id="custom-info"></div>
                            <div id="custom-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .lebar-tabel {
        white-space: normal !important;
        max-width: 150px;
    }
    .lebar-tabel1 {
        white-space: normal !important;
        max-width: 100px;
    }
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        display: inline-flex;
        align-items: center;
        margin: 0 10px;
    }
    .dataTables_wrapper .dataTables_length {
        float: left;
        text-align: left;
    }
    .dataTables_wrapper .dataTables_filter {
        float: right;
        text-align: right;
    }
    .dataTables_wrapper .dataTables_paginate {
        float: right;
        margin-top: 1rem;
    }
    .dataTables_wrapper .dataTables_info {
        margin-top: 1rem;
        float: left;
    }
    .paginate_button {
        padding: 0.375rem 0.75rem;
        margin: 0 2px;
        border-radius: 50%;
        background: #f0f0f0;
        border: none;
        color: #333;
        cursor: pointer;
    }
    .paginate_button.current {
        background: #4e73df;
        color: white !important;
        border-radius: 50%;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #e0e0e0;
    }  
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTable-tipe').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json",
                paginate: {
                    previous: "<",
                    next: ">"
                }
            },
            pageLength: 10,
            order: []
        });
    });
</script>
@endsection