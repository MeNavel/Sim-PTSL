@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Update Data BPN Desa {{ $desanya }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Update Data</li>
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

    <form action="{{ route('updateDataBPN', $desanya) }}" method="POST">
        @csrf
        <div class="row">
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
                            <label for="nib" class="col-sm-3 col-form-label">NIB</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nib" id="nib"
                                       value="{{ old('nib') }}">
                                <span id="cek_nib"></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="luas_ukur" class="col-sm-3 col-form-label">Luas Ukur</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="luas_ukur" id="luas_ukur"
                                       value="{{ old('luas_ukur') }}" oninput=calculate()>
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
                            <label for="luas_permohonan" class="col-sm-3 col-form-label">Luas Dimohon</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" name="luas_permohonan" id="luas_permohonan"
                                       value="{{ old('luas_permohonan') }}" oninput=calculate()>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="beda_luas" id="beda_luas" readonly>
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
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Atas Nama Sertifikat</h5>
                        <div class="row mb-3">
                            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nik" id="nik"
                                       value="{{ old('nik') }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama" id="nama"
                                       value="{{ old('nama') }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                       value="{{ old('tempat_lahir') }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                       value="{{ old('tanggal_lahir') }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="alamat" id="alamat"
                                       value="{{ old('alamat') }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="agama" id="agama"
                                       value="{{ old('agama') }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan"
                                       value="{{ old('pekerjaan') }}" disabled>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
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
            $('#id').blur(function () {
                $('#submit').attr('disabled', true);

                var id = $('#id').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ route('cekDataBPN', $desanya) }}",
                    method: "POST",
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: function (data) {
                        if (data.success === true) {
                            $('#nib').val(data.data.nib);
                            $('#luas_ukur').val(data.data.luas_ukur);
                            $('#pbt').val(data.data.pbt);
                            $('#no_berkas').val(data.data.no_berkas);
                            $('#luas_permohonan').val(data.data.luas_permohonan);
                            $('#beda_luas').val(data.data.beda_luas);
                            $('#batas_utara').val(data.data.batas_utara);
                            $('#batas_timur').val(data.data.batas_timur);
                            $('#batas_selatan').val(data.data.batas_selatan);
                            $('#batas_barat').val(data.data.batas_barat);

                            $('#nik').val(data.data.nik);
                            $('#nama').val(data.data.nama);
                            $('#tempat_lahir').val(data.data.tempat_lahir);
                            $('#tanggal_lahir').val(data.data.tanggal_lahir);
                            $('#alamat').val(data.data.alamat);
                            $('#agama').val(data.data.agama);
                            $('#pekerjaan').val(data.data.pekerjaan);
                            $('#submit').attr('disabled', false);
                        } else {
                            $('#nib').val("");
                            $('#luas_ukur').val("");
                            $('#pbt').val("");
                            $('#no_berkas').val("");
                            $('#luas_permohonan').val("");
                            $('#beda_luas').val("");
                            $('#batas_utara').val("");
                            $('#batas_timur').val("");
                            $('#batas_selatan').val("");
                            $('#batas_barat').val("");

                            $('#nik').val("");
                            $('#nama').val("");
                            $('#tempat_lahir').val("");
                            $('#tanggal_lahir').val("");
                            $('#alamat').val("");
                            $('#agama').val("");
                            $('#pekerjaan').val("");
                            $('#submit').attr('disabled', true);
                        }
                    },
                })
            });
            $('#nib').blur(function () {
                var nib = $('#nib').val();
                var _token = $('input[name="_token"]').val();
                if (nib === "") {
                    $('#cek_nib').hide();
                    $('#submit').attr('disabled', false);
                } else {
                    $.ajax({
                        url: "{{ route('cekNibBPN', $desanya) }}",
                        method: "POST",
                        data: {
                            nib: nib,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === false) {
                                $('#cek_nib').hide();
                                $('#submit').attr('disabled', false);
                            } else {
                                $('#cek_nib').show().html(
                                    '<label id="hasil_nib" class="text-danger"></label>'
                                );

                                if (data.status_nib === false){
                                    $('#hasil_nib').text("NIB harus 5 digit");
                                    $('#submit').attr('disabled', true);
                                }
                                else{
                                    $('#hasil_nib').text("NIB digunakan " + data.data[0].nama + " nominatif " + data.data[0].id);
                                    $('#submit').attr('disabled', true);
                                }
                            }
                        }
                    })
                }

            });
        });
    </script>
@endsection
