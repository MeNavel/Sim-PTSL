@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Formulir Koordinator Desa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('koordinator.index') }}">Koordinator</a></li>
                <li class="breadcrumb-item active">Tambah Koordinator</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="card col-12">
        <div class="card-body">

            <h5 class="card-title">Identitas</h5>

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

            <form action="{{ route('koordinator.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <label for="id" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" id="id" name="id" class="form-control" value="{{ old('id') }}">
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
                    <label for="desa" class="col-sm-2 col-form-label">Desa</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="desa" name="desa" aria-label="State">
                            <option value="">== Pilih Desa ==</option>
                            @foreach ($pengajuan_desa as $desa)
                                <option value="{{ $desa->desa }}" @if (old('desa') == "{{ $desa->desa }}")
                                    {{ 'selected' }}
                                    @endif>{{ $desa->desa }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="dusun" class="col-sm-2 col-form-label">Dusun</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="dusun" name="dusun" aria-label="State">
                            <option value="">== Pilih Dusun ==</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="jabatan" name="jabatan" aria-label="State">
                            <option value="SAKSI 1" @if (old('jabatan') == "SAKSI 1")
                                {{ 'selected' }}
                                @endif>SAKSI 1
                            </option>
                            <option value="SAKSI 2" @if (old('jabatan') == "SAKSI 2")
                                {{ 'selected' }}
                                @endif>SAKSI 2
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2"></label>
                    <div class="col-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            <!-- Tambahan -->
        </div>
    </div>
    <script>
        $(function () {
            var _token = $('input[name="_token"]').val();
            $('#desa').on('change', function () {
                $.ajax({
                    url: "{{ route('koordinator.dusun') }}",
                    method: "POST",
                    data: {
                        desa: $(this).val(),
                        _token: _token
                    },
                    success: function (response) {
                        $('#dusun').empty();
                        $.each(response, function (id, dusun) {
                            $('#dusun').append($("<option/>", {
                                value: dusun,
                                text: dusun
                            }));
                        })
                    }
                });
            });
        });
    </script>

@endsection
