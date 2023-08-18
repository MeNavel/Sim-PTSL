@extends('layouts.app')

@section('content')
    <div class="card col-12">
        <div class="card-body">

            <h5 class="card-title">Ubah Koordinator</h5>

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

            <form action="{{ route('koordinator.update', $data->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="id" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" id="nik" name="nik" class="typeahead form-control" value="{{ $data->id }}"
                               disabled>
                        <input type="hidden" id="id" name="id" value="{{ $data->id }}">
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
                        <input type="text" id="nama" name="nama" class="form-control" value="{{ $data->nama }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control"
                               value="{{ $data->tempat_lahir }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control"
                               value="{{ $data->tanggal_lahir }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $data->alamat }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="agama" name="agama" aria-label="State">
                            <option value="ISLAM" @if ($data->agama == "ISLAM")
                                {{ 'selected' }}
                                @endif>ISLAM
                            </option>
                            <option value="KRISTEN" @if ($data->agama == "KRISTEN")
                                {{ 'selected' }}
                                @endif>KRISTEN
                            </option>
                            <option value="KATOLIK" @if ($data->agama == "KATOLIK")
                                {{ 'selected' }}
                                @endif>KATOLIK
                            </option>
                            <option value="HINDU" @if ($data->agama == "HINDU")
                                {{ 'selected' }}
                                @endif>HINDU
                            </option>
                            <option value="BUDHA" @if ($data->agama == "BUDHA")
                                {{ 'selected' }}
                                @endif>BUDHA
                            </option>
                            <option value="KONGHUCU" @if ($data->agama == "KONGHUCU")
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
                               value="{{ $data->pekerjaan }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="desa" class="col-sm-2 col-form-label">Desa</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="desa" name="desa" aria-label="State">
                            <option value="SIDOMULYO" @if ($data->desa == "SIDOMULYO")
                                {{ 'selected' }}
                                @endif>SIDOMULYO
                            </option>
                            <option value="SIDOREJO" @if ($data->desa == "SIDOREJO")
                                {{ 'selected' }}
                                @endif>SIDOREJO
                            </option>
                            <option value="MUNDUREJO" @if ($data->desa == "MUNDUREJO")
                                {{ 'selected' }}
                                @endif>MUNDUREJO
                            </option>
                            <option value="PONDOK JOYO" @if ($data->desa == "PONDOK JOYO")
                                {{ 'selected' }}
                                @endif>PONDOK JOYO
                            </option>
                            <option value="SUMBERAGUNG" @if ($data->desa == "SUMBERAGUNG")
                                {{ 'selected' }}
                                @endif>SUMBERAGUNG
                            </option>
                            <option value="SIDOMEKAR" @if ($data->desa == "SIDOMEKAR")
                                {{ 'selected' }}
                                @endif>SIDOMEKAR
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="jabatan" name="jabatan" aria-label="State">
                            <option value="SAKSI 1" @if ($data->jabatan == "SAKSI 1")
                                {{ 'selected' }}
                                @endif>SAKSI 1
                            </option>
                            <option value="SAKSI 2" @if ($data->jabatan == "SAKSI 2")
                                {{ 'selected' }}
                                @endif>SAKSI 2
                            </option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-2">Masukkan Data</label>
                    <div class="col-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
