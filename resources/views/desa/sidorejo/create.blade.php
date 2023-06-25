@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Formulir Pendaftaran K1 Desa Sidorejo</h5>

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

            <form action="{{ route('sidorejo.store') }}" method="POST" class="row g-3">
                @csrf
                <table class="table" id="table_pemohon">
                    <thead>
                    <tr>
                        <th scope="col">NIK Pemohon</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="text" name="pemohon[0][id]" placeholder="NIK Pemohon" id="id_pemohon_0"
                                   autofocus class="form-control"></td>
                        <td><input type="text" name="pemohon[0][nama]" placeholder="Nama" id="nama_pemohon_0"
                                   class="form-control"></td>
                        <td><input type="text" name="pemohon[0][tempat_lahir]" id="tempat_lahir_pemohon_0"
                                   placeholder="Tempat Lahir" class="form-control"></td>
                        <td><input type="date" name="pemohon[0][tanggal_lahir]" id="tanggal_lahir_pemohon_0"
                                   placeholder="Tanggal Lahir" class="form-control"></td>
                        <td><input type="text" name="pemohon[0][alamat]" placeholder="Alamat"
                                   id="alamat_pemohon_0" class="form-control"></td>
                        <td><select class="form-select" name="pemohon[0][agama]" aria-label="State"
                                    id="agama_pemohon_0">
                                <option value="ISLAM">ISLAM</option>
                                <option value="KRISTEN">KRISTEN</option>
                                <option value="KATOLIK">KATOLIK</option>
                                <option value="HINDU">HINDU</option>
                                <option value="BUDHA">BUDHA</option>
                                <option value="KONGHUCU">KONGHUCU</option>
                            </select></td>
                        <td><input type="text" name="pemohon[0][pekerjaan]" placeholder="Pekerjaan"
                                   id="pekerjaan_pemohon_0" class="form-control"></td>
                        <td>
                            <button type="button" name="add_pemohon" id="add_pemohon" role="button"
                                    class="btn btn-primary mb-2"><i
                                    class="bi bi-person-plus"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table class="table" id="table_penerima">
                    <thead>
                    <tr>
                        <th scope="col">NIK Penerima</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="text" name="penerima[0][id]" placeholder="NIK Penerima" id="id_penerima_0"
                                   autofocus class="form-control"></td>
                        <td><input type="text" name="penerima[0][nama]" placeholder="Nama" id="nama_penerima_0"
                                   class="form-control"></td>
                        <td><input type="text" name="penerima[0][tempat_lahir]" id="tempat_lahir_penerima_0"
                                   placeholder="Tempat Lahir" class="form-control"></td>
                        <td><input type="date" name="penerima[0][tanggal_lahir]" id="tanggal_lahir_penerima_0"
                                   placeholder="Tanggal Lahir" class="form-control"></td>
                        <td><input type="text" name="penerima[0][alamat]" placeholder="Alamat"
                                   id="alamat_penerima_0" class="form-control"></td>
                        <td><select class="form-select" name="penerima[0][agama]" aria-label="State"
                                    id="agama_penerima_0">
                                <option value="ISLAM">ISLAM</option>
                                <option value="KRISTEN">KRISTEN</option>
                                <option value="KATOLIK">KATOLIK</option>
                                <option value="HINDU">HINDU</option>
                                <option value="BUDHA">BUDHA</option>
                                <option value="KONGHUCU">KONGHUCU</option>
                            </select></td>
                        <td><input type="text" name="penerima[0][pekerjaan]" placeholder="Pekerjaan"
                                   id="pekerjaan_penerima_0" class="form-control"></td>
                        <td>
                            <button type="button" name="add_penerima" id="add_penerima" role="button"
                                    class="btn btn-primary mb-2"><i
                                    class="bi bi-person-plus"></i></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="col-md-2">
                    <label for="no_nominatif" class="form-label">Nominatif</label>
                    <input type="text" name="no_nominatif" class="form-control" id="no_nominatif" value="{{ old('no_nominatif') }}">
                </div>
                <div class="col-md-2">
                    <label for="blok" class="form-label">Blok</label>
                    <input type="text" name="blok" class="form-control" id="blok" value="{{ old('blok') }}">
                </div>
                <div class="col-md-2">
                    <label for="no_sppt" class="form-label">No SPPT</label>
                    <input type="text" name="no_sppt" class="form-control" id="no_sppt" value="{{ old('no_sppt') }}">
                </div>
                <div class="col-md-2">
                    <label for="pbt" class="form-label">PBT</label>
                    <input type="text" name="pbt" class="form-control" id="pbt" value="{{ old('pbt') }}">
                </div>
                <div class="col-md-2">
                    <label for="no_berkas" class="form-label">No Berkas</label>
                    <input type="text" name="no_berkas" class="form-control" id="no_berkas" value="{{ old('no_berkas') }}">
                </div>
                <div class="col-md-2">
                    <label for="nib" class="form-label">NIB</label>
                    <input type="text" name="nib" class="form-control" id="nib" value="{{ old('nib') }}">
                </div>
                <div class="col-md-2">
                    <label for="luas_ukur" class="form-label">Luas Ukur</label>
                    <input type="text" name="luas_ukur" class="form-control" id="luas_ukur" value="{{ old('luas_ukur') }}">
                </div>
                <div class="col-md-2">
                    <label for="beda_luas" class="form-label">Beda Luas</label>
                    <input type="text" name="beda_luas" class="form-control" id="beda_luas" value="{{ old('beda_luas') }}">
                </div>
                <div class="col-md-2">
                    <label for="penggunaan" class="form-label">Penggunaan</label>
                    <select class="form-select" id="penggunaan" name="penggunaan"
                            aria-label="State">
                        <option selected>PEKARANGAN</option>
                        <option value="RUMAH">RUMAH</option>
                        <option value="SAWAH">SAWAH</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="rt" class="form-label">RT</label>
                    <input type="text" name="rt" class="form-control" id="rt" value="{{ old('rt') }}">
                </div>
                <div class="col-md-2">
                    <label for="rw" class="form-label">RW</label>
                    <input type="text" name="rw" class="form-control" id="rw" value="{{ old('rw') }}">
                </div>
                <div class="col-md-2">
                    <label for="dusun" class="form-label">Dusun</label>
                    <input type="text" name="dusun" class="form-control" id="dusun" value="{{ old('dusun') }}">
                </div>
                <div class="col-md-3">
                    <label for="no_c" class="form-label">No C</label>
                    <input type="text" name="no_c" class="form-control" id="no_c" value="{{ old('no_c') }}">
                </div>
                <div class="col-md-3">
                    <label for="persil" class="form-label">Persil</label>
                    <input type="text" name="persil" class="form-control" id="persil" value="{{ old('persil') }}">
                </div>
                <div class="col-md-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control" id="kelas" value="{{ old('kelas') }}">
                </div>
                <div class="col-md-3">
                    <label for="permohonan" class="form-label">Permohonan</label>
                    <input type="text" name="permohonan" class="form-control" id="permohonan" value="{{ old('permohonan') }}">
                </div>
                <div class="col-md-3">
                    <label for="utara" class="form-label">Utara</label>
                    <input type="text" name="utara" class="form-control" id="utara" value="{{ old('utara') }}">
                </div>
                <div class="col-md-3">
                    <label for="timur" class="form-label">Timur</label>
                    <input type="text" name="timur" class="form-control" id="timur" value="{{ old('timur') }}">
                </div>
                <div class="col-md-3">
                    <label for="selatan" class="form-label">Selatan</label>
                    <input type="text" name="selatan" class="form-control" id="selatan" value="{{ old('selatan') }}">
                </div>
                <div class="col-md-3">
                    <label for="barat" class="form-label">Barat</label>
                    <input type="text" name="barat" class="form-control" id="barat" value="{{ old('barat') }}">
                </div>
                <div class="col-md-3">
                    <label for="tahun_1" class="form-label">Tahun 1</label>
                    <input type="text" name="tahun_1" class="form-control" id="tahun_1" value="{{ old('tahun_1') }}">
                </div>
                <div class="col-md-9">
                    <label for="nama_1" class="form-label">Nama 1</label>
                    <input type="text" name="nama_1" class="form-control" id="nama_1" value="{{ old('nama_1') }}">
                </div>
                <div class="col-md-3">
                    <label for="tahun_2" class="form-label">Tahun 2</label>
                    <input type="text" name="tahun_2" class="form-control" id="tahun_2" value="{{ old('tahun_2') }}">
                </div>
                <div class="col-md-9">
                    <label for="nama_2" class="form-label">Nama 2</label>
                    <input type="text" name="nama_2" class="form-control" id="nama_2" value="{{ old('nama_2') }}">
                </div>
                <div class="col-3">
                    <label for="sebab_2" class="form-label">Sebab 2</label>
                    <select class="form-select" id="sebab_2" name="sebab_2"
                            aria-label="State">
                        <option selected></option>
                        <option value="WARIS">WARIS</option>
                        <option value="HIBAH">HIBAH</option>
                        <option value="JUAL BELI">JUAL BELI</option>
                    </select>
                </div>
                <div class="col-md-9">
                    <label for="dasar_2" class="form-label">Dasar 2</label>
                    <input type="text" name="dasar_2" class="form-control" id="dasar_2" value="{{ old('dasar_2') }}">
                </div>
                <div class="col-md-1">
                    <label for="tahun_3" class="form-label">Tahun 3</label>
                    <input type="text" name="tahun_3" class="form-control" id="tahun_3" value="{{ old('tahun_3') }}">
                </div>
                <div class="col-2">
                    <label for="sebab_3" class="form-label">Sebab 3</label>
                    <select class="form-select" id="sebab_3" name="sebab_3"
                            aria-label="State">
                        <option selected></option>
                        <option value="WARIS">WARIS</option>
                        <option value="HIBAH">HIBAH</option>
                        <option value="JUAL BELI">JUAL BELI</option>
                    </select>
                </div>
                <div class="col-md-9">
                    <label for="dasar_3" class="form-label">Dasar 3</label>
                    <input type="text" name="dasar_3" class="form-control" id="dasar_3" value="{{ old('dasar_3') }}">
                </div>

                <div class="text-center">
                    <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                    <button id="reset" type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
            <script>
                var i = 0;
                $('#add_pemohon').click(function () {
                    ++i;
                    while ($('#id_pemohon_' + i).length) {
                        i++
                    }
                    if (i < 10) {
                        $('#table_pemohon').append(
                            `<tr>
                                            <td><input type="text" name="pemohon[` + i + `][id]" placeholder="NIK Pemohon" class="form-control" id="id_pemohon_` + i + `"></td>
                                            <td><input type="text" name="pemohon[` + i + `][nama]" placeholder="Nama" class="form-control" id="nama_pemohon_` + i + `"></td>
                                            <td><input type="text" name="pemohon[` + i + `][tempat_lahir]" placeholder="Tempat Lahir" class="form-control" id="tempat_lahir_pemohon_` + i + `"></td>
                                            <td><input type="date" name="pemohon[` + i + `][tanggal_lahir]" placeholder="Tanggal Lahir" class="form-control" id="tanggal_lahir_pemohon_` + i + `"></td>
                                            <td><input type="text" name="pemohon[` + i + `][alamat]" placeholder="Alamat" class="form-control" id="alamat_pemohon_` + i + `"></td>
                                            <td><select class="form-select" name="pemohon[` + i + `][agama]" aria-label="State" id="agama_pemohon_` + i + `">
                                                    <option value="ISLAM">ISLAM</option>
                                                    <option value="KRISTEN">KRISTEN</option>
                                                    <option value="KATOLIK">KATOLIK</option>
                                                    <option value="HINDU">HINDU</option>
                                                    <option value="BUDHA">BUDHA</option>
                                                    <option value="KONGHUCU">KONGHUCU</option>
                                                </select></td>
                                            <td><input type="text" name="pemohon[` + i + `][pekerjaan]" placeholder="Pekerjaan" class="form-control" id="pekerjaan_pemohon_` + i + `"></td>
                                            <td><button type="button" role="button" class="btn btn-danger remove-table-row"><i class="bi bi-person-x"></i></button></td>
                                        </tr>`
                        );
                        return i;
                    } else {
                        i = 0;
                    }
                });
                var j = 0;
                $('#add_penerima').click(function () {
                    ++j;
                    while ($('#id_penerima_' + j).length) {
                        j++
                    }
                    if (j < 10) {
                        $('#table_penerima').append(
                            `<tr>
                                            <td><input type="text" name="penerima[` + j + `][id]" placeholder="NIK Penerima" class="form-control" id="id_penerima_` + j + `"></td>
                                            <td><input type="text" name="penerima[` + j + `][nama]" placeholder="Nama" class="form-control" id="nama_penerima_` + j + `"></td>
                                            <td><input type="text" name="penerima[` + j + `][tempat_lahir]" placeholder="Tempat Lahir" class="form-control" id="tempat_lahir_penerima_` + j + `"></td>
                                            <td><input type="date" name="penerima[` + j + `][tanggal_lahir]" placeholder="Tanggal Lahir" class="form-control" id="tanggal_lahir_penerima_` + j + `"></td>
                                            <td><input type="text" name="penerima[` + j + `][alamat]" placeholder="Alamat" class="form-control" id="alamat_penerima_` + j + `"></td>
                                            <td><select class="form-select" name="penerima[` + j + `][agama]" aria-label="State" id="agama_penerima_` + j + `">
                                                    <option value="ISLAM">ISLAM</option>
                                                    <option value="KRISTEN">KRISTEN</option>
                                                    <option value="KATOLIK">KATOLIK</option>
                                                    <option value="HINDU">HINDU</option>
                                                    <option value="BUDHA">BUDHA</option>
                                                    <option value="KONGHUCU">KONGHUCU</option>
                                                </select></td>
                                            <td><input type="text" name="penerima[` + j + `][pekerjaan]" placeholder="Pekerjaan" class="form-control" id="pekerjaan_penerima_` + j + `"></td>
                                            <td><button type="button" role="button" class="btn btn-danger remove-table-row"><i class="bi bi-person-x"></i></button></td>
                                        </tr>`
                        );
                        return j;
                    } else {
                        j = 0;
                    }
                });
                $(document).on('click', '.remove-table-row', function () {
                    $(this).parents('tr').remove();
                });
                $(document).on('change', '#id_pemohon_0', function () {
                    var id = $('#id_pemohon_0').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_pemohon_0').val(data.data.nama);
                                $('#tempat_lahir_pemohon_0').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_pemohon_0').val(data.data.tanggal_lahir);
                                $('#alamat_pemohon_0').val(data.data.alamat);
                                $("#agama_pemohon_0").val(data.data.agama);
                                $('#pekerjaan_pemohon_0').val(data.data.pekerjaan);
                                document.getElementById("nama_pemohon_0").readOnly = true;
                                document.getElementById("tempat_lahir_pemohon_0").readOnly = true;
                                document.getElementById("tanggal_lahir_pemohon_0").readOnly = true;
                                document.getElementById("alamat_pemohon_0").readOnly = true;
                                document.getElementById("agama_pemohon_0").readOnly = true;
                                document.getElementById("pekerjaan_pemohon_0").readOnly = true;
                            } else {
                                document.getElementById("nama_pemohon_0").readOnly = false;
                                document.getElementById("tempat_lahir_pemohon_0").readOnly = false;
                                document.getElementById("tanggal_lahir_pemohon_0").readOnly = false;
                                document.getElementById("alamat_pemohon_0").readOnly = false;
                                document.getElementById("agama_pemohon_0").readOnly = false;
                                document.getElementById("pekerjaan_pemohon_0").readOnly = false;
                                $('#nama_pemohon_0').val("");
                                $('#tempat_lahir_pemohon_0').val("");
                                $('#tanggal_lahir_pemohon_0').val("");
                                $('#alamat_pemohon_0').val("");
                                $("#agama_pemohon_0").val("ISLAM");
                                $('#pekerjaan_pemohon_0').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_pemohon_1', function () {
                    var id = $('#id_pemohon_1').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_pemohon_1').val(data.data.nama);
                                $('#tempat_lahir_pemohon_1').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_pemohon_1').val(data.data.tanggal_lahir);
                                $('#alamat_pemohon_1').val(data.data.alamat);
                                $("#agama_pemohon_1").val(data.data.agama);
                                $('#pekerjaan_pemohon_1').val(data.data.pekerjaan);
                                document.getElementById("nama_pemohon_1").readOnly = true;
                                document.getElementById("tempat_lahir_pemohon_1").readOnly = true;
                                document.getElementById("tanggal_lahir_pemohon_1").readOnly = true;
                                document.getElementById("alamat_pemohon_1").readOnly = true;
                                document.getElementById("agama_pemohon_1").readOnly = true;
                                document.getElementById("pekerjaan_pemohon_1").readOnly = true;
                            } else {
                                document.getElementById("nama_pemohon_1").readOnly = false;
                                document.getElementById("tempat_lahir_pemohon_1").readOnly = false;
                                document.getElementById("tanggal_lahir_pemohon_1").readOnly = false;
                                document.getElementById("alamat_pemohon_1").readOnly = false;
                                document.getElementById("agama_pemohon_1").readOnly = false;
                                document.getElementById("pekerjaan_pemohon_1").readOnly = false;
                                $('#nama_pemohon_1').val("");
                                $('#tempat_lahir_pemohon_1').val("");
                                $('#tanggal_lahir_pemohon_1').val("");
                                $('#alamat_pemohon_1').val("");
                                $("#agama_pemohon_1").val("ISLAM");
                                $('#pekerjaan_pemohon_1').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_pemohon_2', function () {
                    var id = $('#id_pemohon_2').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_pemohon_2').val(data.data.nama);
                                $('#tempat_lahir_pemohon_2').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_pemohon_2').val(data.data.tanggal_lahir);
                                $('#alamat_pemohon_2').val(data.data.alamat);
                                $("#agama_pemohon_2").val(data.data.agama);
                                $('#pekerjaan_pemohon_2').val(data.data.pekerjaan);
                                document.getElementById("nama_pemohon_2").readOnly = true;
                                document.getElementById("tempat_lahir_pemohon_2").readOnly = true;
                                document.getElementById("tanggal_lahir_pemohon_2").readOnly = true;
                                document.getElementById("alamat_pemohon_2").readOnly = true;
                                document.getElementById("agama_pemohon_2").readOnly = true;
                                document.getElementById("pekerjaan_pemohon_2").readOnly = true;
                            } else {
                                document.getElementById("nama_pemohon_2").readOnly = false;
                                document.getElementById("tempat_lahir_pemohon_2").readOnly = false;
                                document.getElementById("tanggal_lahir_pemohon_2").readOnly = false;
                                document.getElementById("alamat_pemohon_2").readOnly = false;
                                document.getElementById("agama_pemohon_2").readOnly = false;
                                document.getElementById("pekerjaan_pemohon_2").readOnly = false;
                                $('#nama_pemohon_2').val("");
                                $('#tempat_lahir_pemohon_2').val("");
                                $('#tanggal_lahir_pemohon_2').val("");
                                $('#alamat_pemohon_2').val("");
                                $("#agama_pemohon_2").val("ISLAM");
                                $('#pekerjaan_pemohon_2').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_pemohon_3', function () {
                    var id = $('#id_pemohon_3').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_pemohon_3').val(data.data.nama);
                                $('#tempat_lahir_pemohon_3').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_pemohon_3').val(data.data.tanggal_lahir);
                                $('#alamat_pemohon_3').val(data.data.alamat);
                                $("#agama_pemohon_3").val(data.data.agama);
                                $('#pekerjaan_pemohon_3').val(data.data.pekerjaan);
                                document.getElementById("nama_pemohon_3").readOnly = true;
                                document.getElementById("tempat_lahir_pemohon_3").readOnly = true;
                                document.getElementById("tanggal_lahir_pemohon_3").readOnly = true;
                                document.getElementById("alamat_pemohon_3").readOnly = true;
                                document.getElementById("agama_pemohon_3").readOnly = true;
                                document.getElementById("pekerjaan_pemohon_3").readOnly = true;
                            } else {
                                document.getElementById("nama_pemohon_3").readOnly = false;
                                document.getElementById("tempat_lahir_pemohon_3").readOnly = false;
                                document.getElementById("tanggal_lahir_pemohon_3").readOnly = false;
                                document.getElementById("alamat_pemohon_3").readOnly = false;
                                document.getElementById("agama_pemohon_3").readOnly = false;
                                document.getElementById("pekerjaan_pemohon_3").readOnly = false;
                                $('#nama_pemohon_3').val("");
                                $('#tempat_lahir_pemohon_3').val("");
                                $('#tanggal_lahir_pemohon_3').val("");
                                $('#alamat_pemohon_3').val("");
                                $("#agama_pemohon_3").val("ISLAM");
                                $('#pekerjaan_pemohon_3').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_pemohon_4', function () {
                    var id = $('#id_pemohon_4').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_pemohon_4').val(data.data.nama);
                                $('#tempat_lahir_pemohon_4').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_pemohon_4').val(data.data.tanggal_lahir);
                                $('#alamat_pemohon_4').val(data.data.alamat);
                                $("#agama_pemohon_4").val(data.data.agama);
                                $('#pekerjaan_pemohon_4').val(data.data.pekerjaan);
                                document.getElementById("nama_pemohon_4").readOnly = true;
                                document.getElementById("tempat_lahir_pemohon_4").readOnly = true;
                                document.getElementById("tanggal_lahir_pemohon_4").readOnly = true;
                                document.getElementById("alamat_pemohon_4").readOnly = true;
                                document.getElementById("agama_pemohon_4").readOnly = true;
                                document.getElementById("pekerjaan_pemohon_4").readOnly = true;
                            } else {
                                document.getElementById("nama_pemohon_4").readOnly = false;
                                document.getElementById("tempat_lahir_pemohon_4").readOnly = false;
                                document.getElementById("tanggal_lahir_pemohon_4").readOnly = false;
                                document.getElementById("alamat_pemohon_4").readOnly = false;
                                document.getElementById("agama_pemohon_4").readOnly = false;
                                document.getElementById("pekerjaan_pemohon_4").readOnly = false;
                                $('#nama_pemohon_4').val("");
                                $('#tempat_lahir_pemohon_4').val("");
                                $('#tanggal_lahir_pemohon_4').val("");
                                $('#alamat_pemohon_4').val("");
                                $("#agama_pemohon_4").val("ISLAM");
                                $('#pekerjaan_pemohon_4').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_pemohon_5', function () {
                    var id = $('#id_pemohon_5').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_pemohon_5').val(data.data.nama);
                                $('#tempat_lahir_pemohon_5').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_pemohon_5').val(data.data.tanggal_lahir);
                                $('#alamat_pemohon_5').val(data.data.alamat);
                                $("#agama_pemohon_5").val(data.data.agama);
                                $('#pekerjaan_pemohon_5').val(data.data.pekerjaan);
                                document.getElementById("nama_pemohon_5").readOnly = true;
                                document.getElementById("tempat_lahir_pemohon_5").readOnly = true;
                                document.getElementById("tanggal_lahir_pemohon_5").readOnly = true;
                                document.getElementById("alamat_pemohon_5").readOnly = true;
                                document.getElementById("agama_pemohon_5").readOnly = true;
                                document.getElementById("pekerjaan_pemohon_5").readOnly = true;
                            } else {
                                document.getElementById("nama_pemohon_5").readOnly = false;
                                document.getElementById("tempat_lahir_pemohon_5").readOnly = false;
                                document.getElementById("tanggal_lahir_pemohon_5").readOnly = false;
                                document.getElementById("alamat_pemohon_5").readOnly = false;
                                document.getElementById("agama_pemohon_5").readOnly = false;
                                document.getElementById("pekerjaan_pemohon_5").readOnly = false;
                                $('#nama_pemohon_5').val("");
                                $('#tempat_lahir_pemohon_5').val("");
                                $('#tanggal_lahir_pemohon_5').val("");
                                $('#alamat_pemohon_5').val("");
                                $("#agama_pemohon_5").val("ISLAM");
                                $('#pekerjaan_pemohon_5').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_pemohon_6', function () {
                    var id = $('#id_pemohon_6').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_pemohon_6').val(data.data.nama);
                                $('#tempat_lahir_pemohon_6').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_pemohon_6').val(data.data.tanggal_lahir);
                                $('#alamat_pemohon_6').val(data.data.alamat);
                                $("#agama_pemohon_6").val(data.data.agama);
                                $('#pekerjaan_pemohon_6').val(data.data.pekerjaan);
                                document.getElementById("nama_pemohon_6").readOnly = true;
                                document.getElementById("tempat_lahir_pemohon_6").readOnly = true;
                                document.getElementById("tanggal_lahir_pemohon_6").readOnly = true;
                                document.getElementById("alamat_pemohon_6").readOnly = true;
                                document.getElementById("agama_pemohon_6").readOnly = true;
                                document.getElementById("pekerjaan_pemohon_6").readOnly = true;
                            } else {
                                document.getElementById("nama_pemohon_6").readOnly = false;
                                document.getElementById("tempat_lahir_pemohon_6").readOnly = false;
                                document.getElementById("tanggal_lahir_pemohon_6").readOnly = false;
                                document.getElementById("alamat_pemohon_6").readOnly = false;
                                document.getElementById("agama_pemohon_6").readOnly = false;
                                document.getElementById("pekerjaan_pemohon_6").readOnly = false;
                                $('#nama_pemohon_6').val("");
                                $('#tempat_lahir_pemohon_6').val("");
                                $('#tanggal_lahir_pemohon_6').val("");
                                $('#alamat_pemohon_6').val("");
                                $("#agama_pemohon_6").val("ISLAM");
                                $('#pekerjaan_pemohon_6').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_pemohon_7', function () {
                    var id = $('#id_pemohon_7').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_pemohon_7').val(data.data.nama);
                                $('#tempat_lahir_pemohon_7').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_pemohon_7').val(data.data.tanggal_lahir);
                                $('#alamat_pemohon_7').val(data.data.alamat);
                                $("#agama_pemohon_7").val(data.data.agama);
                                $('#pekerjaan_pemohon_7').val(data.data.pekerjaan);
                                document.getElementById("nama_pemohon_7").readOnly = true;
                                document.getElementById("tempat_lahir_pemohon_7").readOnly = true;
                                document.getElementById("tanggal_lahir_pemohon_7").readOnly = true;
                                document.getElementById("alamat_pemohon_7").readOnly = true;
                                document.getElementById("agama_pemohon_7").readOnly = true;
                                document.getElementById("pekerjaan_pemohon_7").readOnly = true;
                            } else {
                                document.getElementById("nama_pemohon_7").readOnly = false;
                                document.getElementById("tempat_lahir_pemohon_7").readOnly = false;
                                document.getElementById("tanggal_lahir_pemohon_7").readOnly = false;
                                document.getElementById("alamat_pemohon_7").readOnly = false;
                                document.getElementById("agama_pemohon_7").readOnly = false;
                                document.getElementById("pekerjaan_pemohon_7").readOnly = false;
                                $('#nama_pemohon_7').val("");
                                $('#tempat_lahir_pemohon_7').val("");
                                $('#tanggal_lahir_pemohon_7').val("");
                                $('#alamat_pemohon_7').val("");
                                $("#agama_pemohon_7").val("ISLAM");
                                $('#pekerjaan_pemohon_7').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_pemohon_8', function () {
                    var id = $('#id_pemohon_8').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_pemohon_8').val(data.data.nama);
                                $('#tempat_lahir_pemohon_8').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_pemohon_8').val(data.data.tanggal_lahir);
                                $('#alamat_pemohon_8').val(data.data.alamat);
                                $("#agama_pemohon_8").val(data.data.agama);
                                $('#pekerjaan_pemohon_8').val(data.data.pekerjaan);
                                document.getElementById("nama_pemohon_8").readOnly = true;
                                document.getElementById("tempat_lahir_pemohon_8").readOnly = true;
                                document.getElementById("tanggal_lahir_pemohon_8").readOnly = true;
                                document.getElementById("alamat_pemohon_8").readOnly = true;
                                document.getElementById("agama_pemohon_8").readOnly = true;
                                document.getElementById("pekerjaan_pemohon_8").readOnly = true;
                            } else {
                                document.getElementById("nama_pemohon_8").readOnly = false;
                                document.getElementById("tempat_lahir_pemohon_8").readOnly = false;
                                document.getElementById("tanggal_lahir_pemohon_8").readOnly = false;
                                document.getElementById("alamat_pemohon_8").readOnly = false;
                                document.getElementById("agama_pemohon_8").readOnly = false;
                                document.getElementById("pekerjaan_pemohon_8").readOnly = false;
                                $('#nama_pemohon_8').val("");
                                $('#tempat_lahir_pemohon_8').val("");
                                $('#tanggal_lahir_pemohon_8').val("");
                                $('#alamat_pemohon_8').val("");
                                $("#agama_pemohon_8").val("ISLAM");
                                $('#pekerjaan_pemohon8').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_pemohon_9', function () {
                    var id = $('#id_pemohon_9').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_pemohon_9').val(data.data.nama);
                                $('#tempat_lahir_pemohon_9').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_pemohon_9').val(data.data.tanggal_lahir);
                                $('#alamat_pemohon_9').val(data.data.alamat);
                                $("#agama_pemohon_9").val(data.data.agama);
                                $('#pekerjaan_pemohon_9').val(data.data.pekerjaan);
                                document.getElementById("nama_pemohon_9").readOnly = true;
                                document.getElementById("tempat_lahir_pemohon_9").readOnly = true;
                                document.getElementById("tanggal_lahir_pemohon_9").readOnly = true;
                                document.getElementById("alamat_pemohon_9").readOnly = true;
                                document.getElementById("agama_pemohon_9").readOnly = true;
                                document.getElementById("pekerjaan_pemohon_9").readOnly = true;
                            } else {
                                document.getElementById("nama_pemohon_9").readOnly = false;
                                document.getElementById("tempat_lahir_pemohon_9").readOnly = false;
                                document.getElementById("tanggal_lahir_pemohon_9").readOnly = false;
                                document.getElementById("alamat_pemohon_9").readOnly = false;
                                document.getElementById("agama_pemohon_9").readOnly = false;
                                document.getElementById("pekerjaan_pemohon_9").readOnly = false;
                                $('#nama_pemohon_9').val("");
                                $('#tempat_lahir_pemohon_9').val("");
                                $('#tanggal_lahir_pemohon_9').val("");
                                $('#alamat_pemohon_9').val("");
                                $("#agama_pemohon_9").val("ISLAM");
                                $('#pekerjaan_pemohon_9').val("");
                            }
                        },
                    })
                });

                $(document).on('change', '#id_penerima_0', function () {
                    var id = $('#id_penerima_0').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_penerima_0').val(data.data.nama);
                                $('#tempat_lahir_penerima_0').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_penerima_0').val(data.data.tanggal_lahir);
                                $('#alamat_penerima_0').val(data.data.alamat);
                                $("#agama_penerima_0").val(data.data.agama);
                                $('#pekerjaan_penerima_0').val(data.data.pekerjaan);
                                document.getElementById("nama_penerima_0").readOnly = true;
                                document.getElementById("tempat_lahir_penerima_0").readOnly = true;
                                document.getElementById("tanggal_lahir_penerima_0").readOnly = true;
                                document.getElementById("alamat_penerima_0").readOnly = true;
                                document.getElementById("agama_penerima_0").readOnly = true;
                                document.getElementById("pekerjaan_penerima_0").readOnly = true;
                            } else {
                                document.getElementById("nama_penerima_0").readOnly = false;
                                document.getElementById("tempat_lahir_penerima_0").readOnly = false;
                                document.getElementById("tanggal_lahir_penerima_0").readOnly = false;
                                document.getElementById("alamat_penerima_0").readOnly = false;
                                document.getElementById("agama_penerima_0").readOnly = false;
                                document.getElementById("pekerjaan_penerima_0").readOnly = false;
                                $('#nama_penerima_0').val("");
                                $('#tempat_lahir_penerima_0').val("");
                                $('#tanggal_lahir_penerima_0').val("");
                                $('#alamat_penerima_0').val("");
                                $("#agama_penerima_0").val("ISLAM");
                                $('#pekerjaan_penerima_0').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_penerima_1', function () {
                    var id = $('#id_penerima_1').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_penerima_1').val(data.data.nama);
                                $('#tempat_lahir_penerima_1').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_penerima_1').val(data.data.tanggal_lahir);
                                $('#alamat_penerima_1').val(data.data.alamat);
                                $("#agama_penerima_1").val(data.data.agama);
                                $('#pekerjaan_penerima_1').val(data.data.pekerjaan);
                                document.getElementById("nama_penerima_1").readOnly = true;
                                document.getElementById("tempat_lahir_penerima_1").readOnly = true;
                                document.getElementById("tanggal_lahir_penerima_1").readOnly = true;
                                document.getElementById("alamat_penerima_1").readOnly = true;
                                document.getElementById("agama_penerima_1").readOnly = true;
                                document.getElementById("pekerjaan_penerima_1").readOnly = true;
                            } else {
                                document.getElementById("nama_penerima_1").readOnly = false;
                                document.getElementById("tempat_lahir_penerima_1").readOnly = false;
                                document.getElementById("tanggal_lahir_penerima_1").readOnly = false;
                                document.getElementById("alamat_penerima_1").readOnly = false;
                                document.getElementById("agama_penerima_1").readOnly = false;
                                document.getElementById("pekerjaan_penerima_1").readOnly = false;
                                $('#nama_penerima_1').val("");
                                $('#tempat_lahir_penerima_1').val("");
                                $('#tanggal_lahir_penerima_1').val("");
                                $('#alamat_penerima_1').val("");
                                $("#agama_penerima_1").val("ISLAM");
                                $('#pekerjaan_penerima_1').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_penerima_2', function () {
                    var id = $('#id_penerima_2').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_penerima_2').val(data.data.nama);
                                $('#tempat_lahir_penerima_2').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_penerima_2').val(data.data.tanggal_lahir);
                                $('#alamat_penerima_2').val(data.data.alamat);
                                $("#agama_penerima_2").val(data.data.agama);
                                $('#pekerjaan_penerima_2').val(data.data.pekerjaan);
                                document.getElementById("nama_penerima_2").readOnly = true;
                                document.getElementById("tempat_lahir_penerima_2").readOnly = true;
                                document.getElementById("tanggal_lahir_penerima_2").readOnly = true;
                                document.getElementById("alamat_penerima_2").readOnly = true;
                                document.getElementById("agama_penerima_2").readOnly = true;
                                document.getElementById("pekerjaan_penerima_2").readOnly = true;
                            } else {
                                document.getElementById("nama_penerima_2").readOnly = false;
                                document.getElementById("tempat_lahir_penerima_2").readOnly = false;
                                document.getElementById("tanggal_lahir_penerima_2").readOnly = false;
                                document.getElementById("alamat_penerima_2").readOnly = false;
                                document.getElementById("agama_penerima_2").readOnly = false;
                                document.getElementById("pekerjaan_penerima_2").readOnly = false;
                                $('#nama_penerima_2').val("");
                                $('#tempat_lahir_penerima_2').val("");
                                $('#tanggal_lahir_penerima_2').val("");
                                $('#alamat_penerima_2').val("");
                                $("#agama_penerima_2").val("ISLAM");
                                $('#pekerjaan_penerima_2').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_penerima_3', function () {
                    var id = $('#id_penerima_3').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_penerima_3').val(data.data.nama);
                                $('#tempat_lahir_penerima_3').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_penerima_3').val(data.data.tanggal_lahir);
                                $('#alamat_penerima_3').val(data.data.alamat);
                                $("#agama_penerima_3").val(data.data.agama);
                                $('#pekerjaan_penerima_3').val(data.data.pekerjaan);
                                document.getElementById("nama_penerima_3").readOnly = true;
                                document.getElementById("tempat_lahir_penerima_3").readOnly = true;
                                document.getElementById("tanggal_lahir_penerima_3").readOnly = true;
                                document.getElementById("alamat_penerima_3").readOnly = true;
                                document.getElementById("agama_penerima_3").readOnly = true;
                                document.getElementById("pekerjaan_penerima_3").readOnly = true;
                            } else {
                                document.getElementById("nama_penerima_3").readOnly = false;
                                document.getElementById("tempat_lahir_penerima_3").readOnly = false;
                                document.getElementById("tanggal_lahir_penerima_3").readOnly = false;
                                document.getElementById("alamat_penerima_3").readOnly = false;
                                document.getElementById("agama_penerima_3").readOnly = false;
                                document.getElementById("pekerjaan_penerima_3").readOnly = false;
                                $('#nama_penerima_3').val("");
                                $('#tempat_lahir_penerima_3').val("");
                                $('#tanggal_lahir_penerima_3').val("");
                                $('#alamat_penerima_3').val("");
                                $("#agama_penerima_3").val("ISLAM");
                                $('#pekerjaan_penerima_3').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_penerima_4', function () {
                    var id = $('#id_penerima_4').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_penerima_4').val(data.data.nama);
                                $('#tempat_lahir_penerima_4').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_penerima_4').val(data.data.tanggal_lahir);
                                $('#alamat_penerima_4').val(data.data.alamat);
                                $("#agama_penerima_4").val(data.data.agama);
                                $('#pekerjaan_penerima_4').val(data.data.pekerjaan);
                                document.getElementById("nama_penerima_4").readOnly = true;
                                document.getElementById("tempat_lahir_penerima_4").readOnly = true;
                                document.getElementById("tanggal_lahir_penerima_4").readOnly = true;
                                document.getElementById("alamat_penerima_4").readOnly = true;
                                document.getElementById("agama_penerima_4").readOnly = true;
                                document.getElementById("pekerjaan_penerima_4").readOnly = true;
                            } else {
                                document.getElementById("nama_penerima_4").readOnly = false;
                                document.getElementById("tempat_lahir_penerima_4").readOnly = false;
                                document.getElementById("tanggal_lahir_penerima_4").readOnly = false;
                                document.getElementById("alamat_penerima_4").readOnly = false;
                                document.getElementById("agama_penerima_4").readOnly = false;
                                document.getElementById("pekerjaan_penerima_4").readOnly = false;
                                $('#nama_penerima_4').val("");
                                $('#tempat_lahir_penerima_4').val("");
                                $('#tanggal_lahir_penerima_4').val("");
                                $('#alamat_penerima_4').val("");
                                $("#agama_penerima_4").val("ISLAM");
                                $('#pekerjaan_penerima_4').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_penerima_5', function () {
                    var id = $('#id_penerima_5').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_penerima_5').val(data.data.nama);
                                $('#tempat_lahir_penerima_5').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_penerima_5').val(data.data.tanggal_lahir);
                                $('#alamat_penerima_5').val(data.data.alamat);
                                $("#agama_penerima_5").val(data.data.agama);
                                $('#pekerjaan_penerima_5').val(data.data.pekerjaan);
                                document.getElementById("nama_penerima_5").readOnly = true;
                                document.getElementById("tempat_lahir_penerima_5").readOnly = true;
                                document.getElementById("tanggal_lahir_penerima_5").readOnly = true;
                                document.getElementById("alamat_penerima_5").readOnly = true;
                                document.getElementById("agama_penerima_5").readOnly = true;
                                document.getElementById("pekerjaan_penerima_5").readOnly = true;
                            } else {
                                document.getElementById("nama_penerima_5").readOnly = false;
                                document.getElementById("tempat_lahir_penerima_5").readOnly = false;
                                document.getElementById("tanggal_lahir_penerima_5").readOnly = false;
                                document.getElementById("alamat_penerima_5").readOnly = false;
                                document.getElementById("agama_penerima_5").readOnly = false;
                                document.getElementById("pekerjaan_penerima_5").readOnly = false;
                                $('#nama_penerima_5').val("");
                                $('#tempat_lahir_penerima_5').val("");
                                $('#tanggal_lahir_penerima_5').val("");
                                $('#alamat_penerima_5').val("");
                                $("#agama_penerima_5").val("ISLAM");
                                $('#pekerjaan_penerima_5').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_penerima_6', function () {
                    var id = $('#id_penerima_6').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_penerima_6').val(data.data.nama);
                                $('#tempat_lahir_penerima_6').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_penerima_6').val(data.data.tanggal_lahir);
                                $('#alamat_penerima_6').val(data.data.alamat);
                                $("#agama_penerima_6").val(data.data.agama);
                                $('#pekerjaan_penerima_6').val(data.data.pekerjaan);
                                document.getElementById("nama_penerima_6").readOnly = true;
                                document.getElementById("tempat_lahir_penerima_6").readOnly = true;
                                document.getElementById("tanggal_lahir_penerima_6").readOnly = true;
                                document.getElementById("alamat_penerima_6").readOnly = true;
                                document.getElementById("agama_penerima_6").readOnly = true;
                                document.getElementById("pekerjaan_penerima_6").readOnly = true;
                            } else {
                                document.getElementById("nama_penerima_6").readOnly = false;
                                document.getElementById("tempat_lahir_penerima_6").readOnly = false;
                                document.getElementById("tanggal_lahir_penerima_6").readOnly = false;
                                document.getElementById("alamat_penerima_6").readOnly = false;
                                document.getElementById("agama_penerima_6").readOnly = false;
                                document.getElementById("pekerjaan_penerima_6").readOnly = false;
                                $('#nama_penerima_6').val("");
                                $('#tempat_lahir_penerima_6').val("");
                                $('#tanggal_lahir_penerima_6').val("");
                                $('#alamat_penerima_6').val("");
                                $("#agama_penerima_6").val("ISLAM");
                                $('#pekerjaan_penerima_6').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_penerima_7', function () {
                    var id = $('#id_penerima_7').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_penerima_7').val(data.data.nama);
                                $('#tempat_lahir_penerima_7').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_penerima_7').val(data.data.tanggal_lahir);
                                $('#alamat_penerima_7').val(data.data.alamat);
                                $("#agama_penerima_7").val(data.data.agama);
                                $('#pekerjaan_penerima_7').val(data.data.pekerjaan);
                                document.getElementById("nama_penerima_7").readOnly = true;
                                document.getElementById("tempat_lahir_penerima_7").readOnly = true;
                                document.getElementById("tanggal_lahir_penerima_7").readOnly = true;
                                document.getElementById("alamat_penerima_7").readOnly = true;
                                document.getElementById("agama_penerima_7").readOnly = true;
                                document.getElementById("pekerjaan_penerima_7").readOnly = true;
                            } else {
                                document.getElementById("nama_penerima_7").readOnly = false;
                                document.getElementById("tempat_lahir_penerima_7").readOnly = false;
                                document.getElementById("tanggal_lahir_penerima_7").readOnly = false;
                                document.getElementById("alamat_penerima_7").readOnly = false;
                                document.getElementById("agama_penerima_7").readOnly = false;
                                document.getElementById("pekerjaan_penerima_7").readOnly = false;
                                $('#nama_penerima_7').val("");
                                $('#tempat_lahir_penerima_7').val("");
                                $('#tanggal_lahir_penerima_7').val("");
                                $('#alamat_penerima_7').val("");
                                $("#agama_penerima_7").val("ISLAM");
                                $('#pekerjaan_penerima_7').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_penerima_8', function () {
                    var id = $('#id_penerima_8').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_penerima_8').val(data.data.nama);
                                $('#tempat_lahir_penerima_8').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_penerima_8').val(data.data.tanggal_lahir);
                                $('#alamat_penerima_8').val(data.data.alamat);
                                $("#agama_penerima_8").val(data.data.agama);
                                $('#pekerjaan_penerima_8').val(data.data.pekerjaan);
                                document.getElementById("nama_penerima_8").readOnly = true;
                                document.getElementById("tempat_lahir_penerima_8").readOnly = true;
                                document.getElementById("tanggal_lahir_penerima_8").readOnly = true;
                                document.getElementById("alamat_penerima_8").readOnly = true;
                                document.getElementById("agama_penerima_8").readOnly = true;
                                document.getElementById("pekerjaan_penerima_8").readOnly = true;
                            } else {
                                document.getElementById("nama_penerima_8").readOnly = false;
                                document.getElementById("tempat_lahir_penerima_8").readOnly = false;
                                document.getElementById("tanggal_lahir_penerima_8").readOnly = false;
                                document.getElementById("alamat_penerima_8").readOnly = false;
                                document.getElementById("agama_penerima_8").readOnly = false;
                                document.getElementById("pekerjaan_penerima_8").readOnly = false;
                                $('#nama_penerima_8').val("");
                                $('#tempat_lahir_penerima_8').val("");
                                $('#tanggal_lahir_penerima_8').val("");
                                $('#alamat_penerima_8').val("");
                                $("#agama_penerima_8").val("ISLAM");
                                $('#pekerjaan_penerima_8').val("");
                            }
                        },
                    })
                });
                $(document).on('change', '#id_penerima_9', function () {
                    var id = $('#id_penerima_9').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('cek_ktp') }}",
                        method: "POST",
                        data: {
                            id: id,
                            _token: _token
                        },
                        success: function (data) {
                            if (data.success === true) {
                                $('#nama_penerima_9').val(data.data.nama);
                                $('#tempat_lahir_penerima_9').val(data.data.tempat_lahir);
                                $('#tanggal_lahir_penerima_9').val(data.data.tanggal_lahir);
                                $('#alamat_penerima_9').val(data.data.alamat);
                                $("#agama_penerima_9").val(data.data.agama);
                                $('#pekerjaan_penerima_9').val(data.data.pekerjaan);
                                document.getElementById("nama_penerima_9").readOnly = true;
                                document.getElementById("tempat_lahir_penerima_9").readOnly = true;
                                document.getElementById("tanggal_lahir_penerima_9").readOnly = true;
                                document.getElementById("alamat_penerima_9").readOnly = true;
                                document.getElementById("agama_penerima_9").readOnly = true;
                                document.getElementById("pekerjaan_penerima_9").readOnly = true;
                            } else {
                                document.getElementById("nama_penerima_9").readOnly = false;
                                document.getElementById("tempat_lahir_penerima_9").readOnly = false;
                                document.getElementById("tanggal_lahir_penerima_9").readOnly = false;
                                document.getElementById("alamat_penerima_9").readOnly = false;
                                document.getElementById("agama_penerima_9").readOnly = false;
                                document.getElementById("pekerjaan_penerima_9").readOnly = false;
                                $('#nama_penerima_9').val("");
                                $('#tempat_lahir_penerima_9').val("");
                                $('#tanggal_lahir_penerima_9').val("");
                                $('#alamat_penerima_9').val("");
                                $("#agama_penerima_9").val("ISLAM");
                                $('#pekerjaan_penerima_9').val("");
                            }
                        },
                    })
                });
            </script>
        </div>
    </div>
@endsection
