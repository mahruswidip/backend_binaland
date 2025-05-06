@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Edit Lokasi'])

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Form Edit Lokasi</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('lokasi.update', $lokasi->id_lokasi) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lokasi</label>
                                    <input type="text" name="nama_lokasi" class="form-control" value="{{ $lokasi->nama_lokasi }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Perusahaan</label>
                                    <select name="company" class="form-control" required>
                                        <option value="">-- Pilih Company --</option>
                                        <option value="Binaland" {{ $lokasi->company == 'Binaland' ? 'selected' : '' }}>Binaland</option>
                                        <option value="Superland" {{ $lokasi->company == 'Superland' ? 'selected' : '' }}>Superland</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" rows="4" class="form-control" required>{{ $lokasi->deskripsi }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select name="provinsi" id="provinsi" class="form-control select2" required>
                                        <option value="">-- Pilih Provinsi --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kabupaten / Kota</label>
                                    <select name="kota" id="kota" class="form-control select2" required>
                                        <option value="">-- Pilih Kabupaten/Kota --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select name="kecamatan" id="kecamatan" class="form-control select2" required>
                                        <option value="">-- Pilih Kecamatan --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" rows="2" class="form-control" required>{{ $lokasi->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Gambar Lokasi Saat Ini</label><br>
                                    @foreach ($lokasi->gambarLokasi as $gambar)
                                        <img src="{{ asset('storage/' . $gambar->gambar) }}" alt="gambar lokasi" width="100" class="img-thumbnail mb-2">
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Upload Gambar Baru (opsional)</label>
                                    <input type="file" name="gambar[]" class="form-control" accept="image/*" multiple>
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-4">
                        <button class="btn btn-primary btn-sm" type="submit">Update</button>
                        <a href="{{ route('lokasi.layout') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('#provinsi, #kota, #kecamatan').select2({ placeholder: "Pilih", allowClear: true });

        loadDropdown("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json", "provinsi", "{{ $lokasi->provinsi }}");

        $("#provinsi").on("change", function () {
            let selected = this.options[this.selectedIndex];
            let provinsiId = selected.getAttribute('data-id');

            resetDropdown("kota");
            resetDropdown("kecamatan");

            if (provinsiId) {
                loadDropdown(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsiId}.json`, "kota", "{{ $lokasi->kota }}");
            }
        });

        $("#kota").on("change", function () {
            let selected = this.options[this.selectedIndex];
            let kotaId = selected.getAttribute('data-id');

            resetDropdown("kecamatan");

            if (kotaId) {
                loadDropdown(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kotaId}.json`, "kecamatan", "{{ $lokasi->kecamatan }}");
            }
        });
    });

    function loadDropdown(url, elementId, selectedName = '') {
        fetch(url)
            .then(response => response.json())
            .then(data => {
                let select = document.getElementById(elementId);
                select.innerHTML = "<option value=''>Pilih</option>";
                data.forEach(item => {
                    let option = new Option(item.name, item.name);
                    option.setAttribute('data-id', item.id);
                    if (item.name === selectedName) {
                        option.selected = true;
                    }
                    select.add(option);
                });
                $(`#${elementId}`).select2();
            });
    }

    function resetDropdown(elementId) {
        let select = document.getElementById(elementId);
        select.innerHTML = "<option value=''>Pilih</option>";
        $(`#${elementId}`).select2();
    }
</script>
@endsection