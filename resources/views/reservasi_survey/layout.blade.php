@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Reservasi Lokasi'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex align-items-center">
                    <h6>Data Fasilitas</h6>
                    <a href="{{ route('reservasi_survey.add') }}" class="btn bg-gradient-primary btn-sm ms-auto">
                        <span class="fa fa-plus">&nbsp;</span> Tambah Fasilitas
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive px-5 py-2">
                        <table id="dataTable-ReservasiLokasi" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lokasi</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pemesan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telepon</th>
                                    <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th> -->
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jam</th>
                                    <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catatan</th> -->
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservasi as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->lokasi->nama_lokasi }}</td>
                                        <td class="text-center">{{ $item->survey->nama_pemesan }}</td>
                                        <td class="text-center">{{ $item->survey->nomor_telepon }}</td>
                                        <!-- <td class="text-center">{{ $item->survey->email }}</td> -->
                                        <td class="text-center">{{ $item->survey->tanggal_survey }}</td>
                                        <td class="text-center">{{ $item->survey->jam_survey }}</td>
                                        <!-- <td class="text-center">{{ $item->survey->catatan }}</td> -->
                                        <td class="text-center">
                                            <a href="#" class="badge 
                                                {{ 
                                                    $item->survey->status == 'Pending' ? 'bg-warning' : 
                                                    ($item->survey->status == 'Dikonfirmasi' ? 'bg-success' : 
                                                    ($item->survey->status == 'Dibatalkan' ? 'bg-danger' : 'bg-secondary')) 
                                                }}">
                                                {{ ucfirst($item->survey->status) }}
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('reservasi_survey.edit', $item->id_reservasi_lokasi) }}" class="btn bg-gradient-info btn-sm">Edit</a>
                                            <form action="{{ route('reservasi_survey.destroy', $item->id_reservasi_lokasi) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn bg-gradient-danger btn-sm">Hapus</button>
                                            </form>
                                            <a href="{{ route('reservasi_survey.detail', $item->id_reservasi_lokasi) }}" class="btn bg-gradient-success btn-sm">Detail</a>
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
        max-width: 250px;
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
        $('#dataTable-ReservasiLokasi').DataTable({
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
