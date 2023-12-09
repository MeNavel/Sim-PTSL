@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Formulir Pendaftaran Sertifikat Tanah Desa Semboro</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('semboro.index') }}">Semboro</a></li>
                <li class="breadcrumb-item active">Tambah Data K1</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('semboro.store') }}" method="POST">
        @csrf
        <div class="row">
            {{--Spesifikasi Data--}}
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Spesifikasi Data</h5>
                        <div class="row mb-3">
                            <label for="id" class="col-sm-3 col-form-label">Nominatif</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="id" id="id"
                                       value="{{ old('id') }}" autofocus>
                                <span id="cek_id"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="blok" class="col-sm-3 col-form-label">Blok</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="blok" id="blok"
                                       value="{{ old('blok') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="sppt" class="col-sm-3 col-form-label">SPPT</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="sppt" id="sppt"
                                       value="{{ old('sppt') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pbt" class="col-sm-3 col-form-label">PBT</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="pbt" id="pbt"
                                       value="{{ old('pbt') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="no_berkas" class="col-sm-3 col-form-label">No Berkas</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="no_berkas" id="no_berkas"
                                       value="{{ old('no_berkas') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nib" class="col-sm-3 col-form-label">NIB</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nib" id="nib"
                                       value="{{ old('nib') }}">
                                <span id="cek_nib"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="luas_ukur" class="col-sm-3 col-form-label">Luas Ukur</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="luas_ukur" id="luas_ukur"
                                       value="{{ old('luas_ukur') }}" oninput=calculate()>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="beda_luas" id="beda_luas" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Atas Nama Sertifikat--}}
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Atas Nama Sertifikat</h5>
                        <div class="row mb-3">
                            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nik" id="nik"
                                       value="{{ old('nik') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" id="nama"
                                       value="{{ old('nama') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                       value="{{ old('tempat_lahir') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                       value="{{ old('tanggal_lahir') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" id="alamat"
                                       value="{{ old('alamat') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="agama" id="agama"
                                       value="{{ old('agama') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan"
                                       value="{{ old('pekerjaan') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--Data Tanah--}}
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Tanah</h5>
                        <div class="row mb-3">
                            <label for="rt" class="col-sm-3 col-form-label">RT</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="rt" id="rt"
                                       value="{{ old('rt') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rw" class="col-sm-3 col-form-label">RW</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="rw" id="rw"
                                       value="{{ old('rw') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="dusun" class="col-sm-3 col-form-label">Dusun</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="dusun" name="dusun" aria-label="State">
                                    <option value="SEMBORO LOR" selected>SEMBORO LOR</option>
                                    <option value="SEMBORO KIDUL">SEMBORO KIDUL</option>
                                    <option value="SEMBORO PASAR">SEMBORO PASAR</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="no_c" class="col-sm-3 col-form-label">Nomor C</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_c" id="no_c"
                                       value="{{ old('nomor_c') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="persil" class="col-sm-3 col-form-label">Persil</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="persil" id="persil"
                                       value="{{ old('persil') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="klas" class="col-sm-3 col-form-label">Klas</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="klas" id="klas"
                                       value="{{ old('klas') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status_penggunaan" class="col-sm-3 col-form-label">Penggunaan</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="status_penggunaan" name="status_penggunaan"
                                        aria-label="State">
                                    <option value="PEKARANGAN" selected>PEKARANGAN</option>
                                    <option value="PEKARANGAN ADA BANGUNANNYA">PEKARANGAN ADA BANGUNANNYA</option>
                                    <option value="SAWAH">SAWAH</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="luas_permohonan" class="col-sm-3 col-form-label">Luas</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="luas_permohonan" id="luas_permohonan"
                                       value="{{ old('luas_permohonan') }}" oninput=calculate()>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="batas_utara" class="col-sm-3 col-form-label">Utara</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="batas_utara" id="batas_utara"
                                       value="{{ old('batas_utara') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="batas_timur" class="col-sm-3 col-form-label">Timur</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="batas_timur" id="batas_timur"
                                       value="{{ old('batas_timur') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="batas_selatan" class="col-sm-3 col-form-label">Selatan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="batas_selatan" id="batas_selatan"
                                       value="{{ old('batas_selatan') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="batas_barat" class="col-sm-3 col-form-label">Barat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="batas_barat" id="batas_barat"
                                       value="{{ old('batas_barat') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                {{--Peralihan--}}
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Peralihan</h5>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="tahun_1" class="form-label">Tahun 1</label>
                                <input type="number" class="form-control" name="tahun_1" id="tahun_1"
                                       value="{{ old('tahun_1') }}">
                            </div>
                            <div class="col-md-9">
                                <label for="nama_1" class="form-label">Nama 1</label>
                                <input type="text" class="form-control" name="nama_1" id="nama_1"
                                       value="{{ old('nama_1') }}">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                    <label class="form-check-label" for="flexSwitchCheckDefault" id="labelgridCheck1">Sama dengan pengajuan sertifikat</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="tahun_2" class="form-label">Tahun 2</label>
                                <input type="number" class="form-control" name="tahun_2" id="tahun_2"
                                       value="{{ old('tahun_2') }}">
                            </div>
                            <div class="col-md-9">
                                <label for="nama_2" class="form-label">Nama 2</label>
                                <input type="text" class="form-control" name="nama_2" id="nama_2"
                                       value="{{ old('nama_2') }}">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="gridCheck2">
                                    <label class="form-check-label" for="flexSwitchCheckDefault" id="labelgridCheck2">Sama dengan pengajuan sertifikat</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="sebab_2" class="form-label">Sebab 2</label>
                                <select class="form-select" id="sebab_2" name="sebab_2" aria-label="State">
                                    <option selected></option>
                                    <option value="WARIS">WARIS</option>
                                    <option value="HIBAH">HIBAH</option>
                                    <option value="JUAL BELI">JUAL BELI</option>
                                </select>
                            </div>
                            <div class="col-md-9">
                                <label for="dasar_2" class="form-label">Dasar Peralihan 2</label>
                                <input type="text" class="form-control" name="dasar_2" id="dasar_2"
                                       value="{{ old('dasar_2') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="tahun_3" class="form-label">Tahun 3</label>
                                <input type="number" class="form-control" name="tahun_3" id="tahun_3"
                                       value="{{ old('tahun_3') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="sebab_3" class="form-label">Sebab 3</label>
                                <select class="form-select" id="sebab_3" name="sebab_3" aria-label="State">
                                    <option selected></option>
                                    <option value="WARIS">WARIS</option>
                                    <option value="HIBAH">HIBAH</option>
                                    <option value="JUAL BELI">JUAL BELI</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="dasar_3" class="form-label">Dasar Peralihan 3</label>
                                <input type="text" class="form-control" name="dasar_3" id="dasar_3"
                                       value="{{ old('dasar_3') }}">
                            </div>
                        </div>
                    </div>
                </div>

                {{--Penanggung Jawab--}}
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Penanggung Jawab</h5>
                        <div class="row mb-3">
                            <label for="nik_saksi_1" class="col-sm-3 col-form-label">Koordinator</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="nik_saksi_1" name="nik_saksi_1" aria-label="State">
                                    @foreach($data as $koordinator)
                                        <option value="{{ $koordinator->id }}">{{ $koordinator->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="no_hp" class="col-sm-3 col-form-label">Nomor Handphone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_hp" id="no_hp"
                                       value="{{ old('no_hp') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal_pendataan" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal_pendataan" id="tanggal_pendataan"
                                       value="{{ old('tanggal_pendataan') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function () {
            $('#submit').attr('disabled', true);
            $('#id').blur(function () {
                var id = $('#id').val();
                var _token = $('input[name="_token"]').val();
                if (id === "") {
                    $('#cek_id').show().html(
                        '<label class="text-danger">Nomor Nominatif Harus Diisi</label>');
                    $('#submit').attr('disabled', 'true');
                } else {
                    $.ajax({
                        url: "{{ route('semboro.cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (result) {
                            if (result.success === false) {
                                $('#cek_id').hide();
                                $('#submit').attr('disabled', false);
                            } else {
                                $('#cek_id').show().html(
                                    '<label id="hasil_cek" class="text-danger"></label>'
                                );
                                $('#hasil_cek').text("Nominatif digunakan " + result.data);
                                $('#submit').attr('disabled', true);
                            }
                        }
                    })
                }
            });

            $('#nib').blur(function () {
                var nib = $('#nib').val();
                var _token = $('input[name="_token"]').val();
                if (nib === "") {
                    $('#cek_nib').hide();
                    $('#submit').attr('disabled', false);
                } else {
                    $.ajax({
                        url: "{{ route('semboro.cek_nib') }}",
                        method: "POST",
                        data: {
                            nib: nib,
                            _token: _token
                        },
                        success: function (result) {
                            if (result.success === false) {
                                $('#cek_nib').hide();
                                $('#submit').attr('disabled', false);
                            } else {
                                $('#cek_nib').show().html(
                                    '<label id="hasil_nib" class="text-danger"></label>'
                                );
                                $('#hasil_nib').text("NIB digunakan " + result.data[0].nama + " nominatif " + result.data[0].id);
                                $('#submit').attr('disabled', true);
                            }
                        }
                    })
                }

            });

            $('#gridCheck1').click(function () {
                if ($('#gridCheck1').is(':checked')) {
                    $('#gridCheck2').attr('disabled', true);
                    $('#labelgridCheck2').attr('disabled', true);
                    $('#tahun_2').attr('disabled', true).val("");
                    $('#nama_2').attr('disabled', true).val("");
                    $('#sebab_2').attr('disabled', true).val("");
                    $('#dasar_2').attr('disabled', true).val("");
                    $('#tahun_3').attr('disabled', true).val("");
                    $('#sebab_3').attr('disabled', true).val("");
                    $('#dasar_3').attr('disabled', true).val("");
                    $('#nama_1').val($('#nama').val()).attr('readonly', true);
                } else {
                    $('#gridCheck2').attr('disabled', false);
                    $('#labelgridCheck2').attr('disabled', false);
                    $('#tahun_2').attr('disabled', false).val("");
                    $('#nama_2').attr('disabled', false).val("");
                    $('#sebab_2').attr('disabled', false).val("");
                    $('#dasar_2').attr('disabled', false).val("");
                    $('#tahun_3').attr('disabled', false).val("");
                    $('#sebab_3').attr('disabled', false).val("");
                    $('#dasar_3').attr('disabled', false).val("");
                    $('#nama_1').val("").attr('readonly', false);
                }
            });

            $('#gridCheck2').click(function () {
                if ($('#gridCheck2').is(':checked')) {
                    $('#gridCheck1').attr('disabled', true);
                    $('#labelgridCheck1').attr('disabled', true);
                    $('#tahun_3').attr('disabled', true).val("");
                    $('#sebab_3').attr('disabled', true).val("");
                    $('#dasar_3').attr('disabled', true).val("");
                    $('#nama_2').val($('#nama').val()).attr('readonly', true);
                } else {
                    $('#gridCheck1').attr('disabled', false);
                    $('#labelgridCheck1').attr('disabled', false);
                    $('#tahun_3').attr('disabled', false).val("");
                    $('#sebab_3').attr('disabled', false).val("");
                    $('#dasar_3').attr('disabled', false).val("");
                    $('#nama_2').val("").attr('readonly', false);
                }
            });
        });
    </script>
@endsection
