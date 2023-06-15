@extends('layouts.app')

@section('content')
    <div class="card col-12">
        <div class="card-body">

            <h5 class="card-title">Formulir Kartu Tanda Penduduk</h5>

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

            <form action="{{ route('pemohon.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="id" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" id="id" name="id" class="typeahead form-control" value="{{ old('id') }}">
                        @error('id')
                        <span>
                            <label class="text-danger">{{ $message }}</label>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control"
                               value="{{ old('tempat_lahir') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control"
                               value="{{ old('tanggal_lahir') }}">
                    </div>
                </div>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                                   name="jenis_kelamin" id="jenis_kelamin"
                                   value="LAKI-LAKI" @if(old('jenis_kelamin') == "LAKI-LAKI")
                                {{ "checked" }}
                                @endif>
                            <label class="form-check-label" for="gridRadios1">
                                LAKI-LAKI
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin"
                                   value="PEREMPUAN" @if(old('jenis_kelamin') == "PEREMPUAN")
                                {{ "checked" }}
                                @endif>
                            <label class="form-check-label" for="gridRadios2">
                                PEREMPUAN
                            </label>
                        </div>
                    </div>
                </fieldset>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" id="alamat" name="alamat" class="form-control" value="{{ old('alamat') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="agama" name="agama" aria-label="State">
                            <option value="ISLAM" @if (old('agama') == "ISLAM")
                                {{ 'selected' }}
                                @endif>ISLAM
                            </option>
                            <option value="KRISTEN" @if (old('agama') == "KRISTEN")
                                {{ 'selected' }}
                                @endif>KRISTEN
                            </option>
                            <option value="KATOLIK" @if (old('agama') == "KATOLIK")
                                {{ 'selected' }}
                                @endif>KATOLIK
                            </option>
                            <option value="HINDU" @if (old('agama') == "HINDU")
                                {{ 'selected' }}
                                @endif>HINDU
                            </option>
                            <option value="BUDHA" @if (old('agama') == "BUDHA")
                                {{ 'selected' }}
                                @endif>BUDHA
                            </option>
                            <option value="KONGHUCU" @if (old('agama') == "KONGHUCU")
                                {{ 'selected' }}
                                @endif>KONGHUCU
                            </option>
                        </select>
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-control"
                               value="{{ old('pekerjaan') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_hp" class="col-sm-2 col-form-label">Nomor HP</label>
                    <div class="col-sm-10">
                        <input type="text" id="no_hp" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2">Masukkan Data</label>
                    <div class="col-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            <!-- Tambahan -->

            <script type="text/javascript">
                $('input.typeahead').typeahead({
                    source: function (query, process) {

                        $.ajax({
                            url: "{{ route('autocomplete') }}",
                            data: {outlets: $("#outlet").val()},
                            type: 'GET',
                            dataType: 'JSON',
                            success: function (data) {
                                process(data);
                            }
                        });
                    }
                });
            </script>
        </div>
    </div>

@endsection
