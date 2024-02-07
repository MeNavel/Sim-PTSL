@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Unduh Data Pendaftaran Tanah Sistematis Lengkap</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Unduh</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tim 2 Badan Pertanahan Nasional</h5>

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

            <table class="table text-center">
                <thead>
                <tr>
                    <th scope="col">Desa</th>
                    <th scope="col">File Koordinator</th>
                    <th scope="col">File BPN</th>
                </tr>
                </thead>
                <tbody>

                @can('unduh-kramatsukoharjo')
                <tr>
                    <th scope="row">Kramat Sukoharjo</th>
                    <td class="text-center"><a href="{{ route('unduh.desa.perkoordinator', 'KramatSukoharjo') }}">Data Pemohon Untuk Setiap Koordinator &nbsp;<i class="bi bi-download"></i></a></td>
                    <td class="text-center"><a href="{{ route('unduh.desa.lengkap', 'KramatSukoharjo') }}">Data Pemohon Seluruh Desa &nbsp;<i class="bi bi-download"></i></a></td>
                </tr>
                @endcan

                @can('unduh-semboro')
                <tr>
                    <th scope="row">Semboro</th>
                    <td class="text-center"><a href="{{ route('unduh.desa.perkoordinator', 'Semboro') }}">Data Pemohon Untuk Setiap Koordinator <i class="bi bi-download"></i></a></td>
                    <td class="text-center"><a href="{{ route('unduh.desa.lengkap', 'Semboro') }}">Data Pemohon Seluruh Desa <i class="bi bi-download"></i></a></td>
                </tr>
                @endcan
                @can('unduh-sidomulyo')
                    <tr>
                        <th scope="row">Sidomulyo</th>
                        <td class="text-center"><a href="{{ route('unduh.desa.perkoordinator', 'Sidomulyo') }}">Data Pemohon Untuk Setiap Koordinator &nbsp;<i class="bi bi-download"></i></a></td>
                        <td class="text-center"><a href="{{ route('unduh.desa.lengkap', 'Sidomulyo') }}">Data Pemohon Seluruh Desa &nbsp;<i class="bi bi-download"></i></a></td>
                    </tr>
                @endcan
                @can('unduh-sidorejo')
                    <tr>
                        <th scope="row">Sidorejo</th>
                        <td class="text-center"><a href="{{ route('unduh.desa.perkoordinator', 'Sidorejo') }}">Data Pemohon Untuk Setiap Koordinator &nbsp;<i class="bi bi-download"></i></a></td>
                        <td class="text-center"><a href="{{ route('unduh.desa.lengkap', 'Sidorejo') }}">Data Pemohon Seluruh Desa &nbsp;<i class="bi bi-download"></i></a></td>
                    </tr>
                @endcan
                @can('unduh-pondokjoyo')
                    <tr>
                        <th scope="row">Pondokjoyo</th>
                        <td class="text-center"><a href="{{ route('unduh.desa.perkoordinator', 'Pondokjoyo') }}">Data Pemohon Untuk Setiap Koordinator &nbsp;<i class="bi bi-download"></i></a></td>
                        <td class="text-center"><a href="{{ route('unduh.desa.lengkap', 'Pondokjoyo') }}">Data Pemohon Seluruh Desa &nbsp;<i class="bi bi-download"></i></a></td>
                    </tr>
                @endcan
                @can('unduh-mundurejo')
                    <tr>
                        <th scope="row">Mundurejo</th>
                        <td class="text-center"><a href="{{ route('unduh.desa.perkoordinator', 'Mundurejo') }}">Data Pemohon Untuk Setiap Koordinator &nbsp;<i class="bi bi-download"></i></a></td>
                        <td class="text-center"><a href="{{ route('unduh.desa.lengkap', 'Mundurejo') }}">Data Pemohon Seluruh Desa &nbsp;<i class="bi bi-download"></i></a></td>
                    </tr>
                @endcan
                @can('unduh-sumberagung')
                    <tr>
                        <th scope="row">Sumberagung</th>
                        <td class="text-center"><a href="{{ route('unduh.desa.perkoordinator', 'Sumberagung') }}">Data Pemohon Untuk Setiap Koordinator &nbsp;<i class="bi bi-download"></i></a></td>
                        <td class="text-center"><a href="{{ route('unduh.desa.lengkap', 'Sumberagung') }}">Data Pemohon Seluruh Desa &nbsp;<i class="bi bi-download"></i></a></td>
                    </tr>
                @endcan

                @can('unduh-sidomekar')
                    <tr>
                        <th scope="row">Sidomekar</th>
                        <td class="text-center"><a href="{{ route('unduh.desa.perkoordinator', 'Sidomekar') }}">Data Pemohon Untuk Setiap Koordinator &nbsp;<i class="bi bi-download"></i></a></td>
                        <td class="text-center"><a href="{{ route('unduh.desa.lengkap', 'Sidomekar') }}">Data Pemohon Seluruh Desa &nbsp;<i class="bi bi-download"></i></a></td>
                    </tr>
                @endcan

                </tbody>
            </table>
        </div>
    </div>
@endsection
