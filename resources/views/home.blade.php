@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{'home'}}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rekapitulasi</h5>
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th scope="col">Desa</th>
                        <th scope="col">Total Pendaftar</th>
                        <th scope="col">NIB</th>
                        <th scope="col">NIB Kosong</th>
                        <th scope="col">Nomor Berkas</th>
                        <th scope="col">Nomor Berkas Kosong</th>
                        <th scope="col">Update Data BPN</th>
                    </tr>
                    </thead>
                    <tbody>
                    @can('karangsono-index')
                        <tr>
                            <th scope="row">Karangsono</th>
                            <td>{{ $nib_karangsono + $belum_nib_karangsono }}</td>
                            <td>{{ $nib_karangsono }}</td>
                            <td>{{ $belum_nib_karangsono }}</td>
                            <td>{{ $no_berkas_karangsono }}</td>
                            <td>{{ $belum_no_berkas_karangsono }}</td>
                            <td>@can('karangsono-edit')
                                    <a href="{{ route('showDataBPN', 'Karangsono') }}"><i
                                            class="bi bi-pencil-square"></i></a>
                                @endcan</td>
                        </tr>
                    @endcan
                    @can('patemon-index')
                        <tr>
                            <th scope="row">Patemon</th>
                            <td>{{ $nib_patemon + $belum_nib_patemon }}</td>
                            <td>{{ $nib_patemon }}</td>
                            <td>{{ $belum_nib_patemon }}</td>
                            <td>{{ $no_berkas_patemon }}</td>
                            <td>{{ $belum_no_berkas_patemon }}</td>
                            <td>@can('patemon-edit')
                                    <a href="{{ route('showDataBPN', 'Patemon') }}"><i class="bi bi-pencil-square"></i></a>
                                @endcan</td>
                        </tr>
                    @endcan
                    @can('kramatsukoharjo-index')
                        <tr>
                            <th scope="row">Kramat Sukoharjo</th>
                            <td>{{ $nib_kramatsukoharjo + $belum_nib_kramatsukoharjo }}</td>
                            <td>{{ $nib_kramatsukoharjo }}</td>
                            <td>{{ $belum_nib_kramatsukoharjo }}</td>
                            <td>{{ $no_berkas_kramatsukoharjo }}</td>
                            <td>{{ $belum_no_berkas_kramatsukoharjo }}</td>
                            <td>@can('kramatsukoharjo-edit')
                                    <a href="{{ route('showDataBPN', 'KramatSukoharjo') }}"><i
                                            class="bi bi-pencil-square"></i></a>
                                @endcan</td>
                        </tr>
                    @endcan
                    @can('semboro-index')
                        <tr>
                            <th scope="row">Semboro</th>
                            <td>{{ $nib_semboro + $belum_nib_semboro }}</td>
                            <td>{{ $nib_semboro }}</td>
                            <td>{{ $belum_nib_semboro }}</td>
                            <td>{{ $no_berkas_semboro }}</td>
                            <td>{{ $belum_no_berkas_semboro }}</td>
                            <td>@can('semboro-edit')
                                    <a href="{{ route('showDataBPN', 'Semboro') }}"><i class="bi bi-pencil-square"></i></a>
                                @endcan</td>
                        </tr>
                    @endcan
                    @can('sidomulyo-index')
                        <tr>
                            <th scope="row">Sidomulyo</th>
                            <td>{{ $nib_sidomulyo + $belum_nib_sidomulyo }}</td>
                            <td>{{ $nib_sidomulyo }}</td>
                            <td>{{ $belum_nib_sidomulyo }}</td>
                            <td>{{ $no_berkas_sidomulyo }}</td>
                            <td>{{ $belum_no_berkas_sidomulyo }}</td>
                            <td>@can('sidomulyo-edit')
                                    <a href="{{ route('showDataBPN', 'Sidomulyo') }}"><i
                                            class="bi bi-pencil-square"></i></a>
                                @endcan</td>
                        </tr>
                    @endcan
                    @can('sidorejo-index')
                        <tr>
                            <th scope="row">Sidorejo</th>
                            <td>{{ $nib_sidorejo + $belum_nib_sidorejo }}</td>
                            <td>{{ $nib_sidorejo }}</td>
                            <td>{{ $belum_nib_sidorejo }}</td>
                            <td>{{ $no_berkas_sidorejo }}</td>
                            <td>{{ $belum_no_berkas_sidorejo }}</td>
                            <td>@can('sidorejo-edit')
                                    <a href="{{ route('showDataBPN', 'Sidorejo') }}"><i class="bi bi-pencil-square"></i></a>
                                @endcan</td>
                        </tr>
                    @endcan
                    @can('pondokjoyo-index')
                        <tr>
                            <th scope="row">Pondokjoyo</th>
                            <td>{{ $nib_pondokjoyo + $belum_nib_pondokjoyo }}</td>
                            <td>{{ $nib_pondokjoyo }}</td>
                            <td>{{ $belum_nib_pondokjoyo }}</td>
                            <td>{{ $no_berkas_pondokjoyo }}</td>
                            <td>{{ $belum_no_berkas_pondokjoyo }}</td>
                            <td>@can('pondokjoyo-edit')
                                    <a href="{{ route('showDataBPN', 'Pondokjoyo') }}"><i
                                            class="bi bi-pencil-square"></i></a>
                                @endcan</td>
                        </tr>
                    @endcan
                    @can('mundurejo-index')
                        <tr>
                            <th scope="row">Mundurejo</th>
                            <td>{{ $nib_mundurejo + $belum_nib_mundurejo }}</td>
                            <td>{{ $nib_mundurejo }}</td>
                            <td>{{ $belum_nib_mundurejo }}</td>
                            <td>{{ $no_berkas_mundurejo }}</td>
                            <td>{{ $belum_no_berkas_mundurejo }}</td>
                            <td>@can('mundurejo-edit')
                                    <a href="{{ route('showDataBPN', 'Mundurejo') }}"><i
                                            class="bi bi-pencil-square"></i></a>
                                @endcan</td>
                        </tr>
                    @endcan
                    @can('sumberagung-index')
                        <tr>
                            <th scope="row">Sumberagung</th>
                            <td>{{ $nib_sumberagung + $belum_nib_sumberagung }}</td>
                            <td>{{ $nib_sumberagung }}</td>
                            <td>{{ $belum_nib_sumberagung }}</td>
                            <td>{{ $no_berkas_sumberagung }}</td>
                            <td>{{ $belum_no_berkas_sumberagung }}</td>
                            <td>@can('sumberagung-edit')
                                    <a href="{{ route('showDataBPN', 'Sumberagung') }}"><i
                                            class="bi bi-pencil-square"></i></a>
                                @endcan</td>
                        </tr>
                    @endcan
                    @can('sidomekar-index')
                        <tr>
                            <th scope="row">Sidomekar</th>
                            <td>{{ $nib_sidomekar + $belum_nib_sidomekar }}</td>
                            <td>{{ $nib_sidomekar }}</td>
                            <td>{{ $belum_nib_sidomekar }}</td>
                            <td>{{ $no_berkas_sidomekar }}</td>
                            <td>{{ $belum_no_berkas_sidomekar }}</td>
                            <td>@can('sidomekar-edit')
                                    <a href="{{ route('showDataBPN', 'Sidomekar') }}"><i
                                            class="bi bi-pencil-square"></i></a>
                                @endcan</td>
                        </tr>
                    @endcan
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <div class="row">
        @can('patemon-index')
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Patemon</h5>

                        <!-- Bar Chart -->
                        <div id="patemon"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#patemon"), {
                                    series: [{
                                        name: "Jumlah ",
                                        data: [
                                            @foreach($patemon as $item)
                                                {{ $item->jumlah }},
                                            @endforeach]
                                    }],
                                    chart: {
                                        type: 'bar',
                                        height: 500
                                    },
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 4,
                                            horizontal: false,
                                        }
                                    },
                                    dataLabels: {
                                        enabled: true
                                    },
                                    xaxis: {
                                        categories: [
                                            @foreach($patemon as $item)
                                                '{{ $item->koordinator }}',
                                            @endforeach
                                        ],
                                    }
                                }).render();
                            });
                        </script>
                        <!-- End Bar Chart -->

                    </div>
                </div>
            </div>
        @endcan

        @can('kramatsukoharjo-index')
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kramat Sukoharjo</h5>

                        <!-- Bar Chart -->
                        <div id="kramatsukoharjo"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#kramatsukoharjo"), {
                                    series: [{
                                        name: "Jumlah ",
                                        data: [
                                            @foreach($kramatsukoharjo as $item)
                                                {{ $item->jumlah }},
                                            @endforeach]
                                    }],
                                    chart: {
                                        type: 'bar',
                                        height: 500
                                    },
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 4,
                                            horizontal: false,
                                        }
                                    },
                                    dataLabels: {
                                        enabled: true
                                    },
                                    xaxis: {
                                        categories: [
                                            @foreach($kramatsukoharjo as $item)
                                                '{{ $item->koordinator }}',
                                            @endforeach
                                        ],
                                    }
                                }).render();
                            });
                        </script>
                        <!-- End Bar Chart -->

                    </div>
                </div>
            </div>
        @endcan

        @can('semboro-index')
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Semboro</h5>

                        <!-- Bar Chart -->
                        <div id="semboro"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#semboro"), {
                                    series: [{
                                        name: "Jumlah ",
                                        data: [
                                            @foreach($semboro as $item)
                                                {{ $item->jumlah }},
                                            @endforeach]
                                    }],
                                    chart: {
                                        type: 'bar',
                                        height: 500
                                    },
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 4,
                                            horizontal: false,
                                        }
                                    },
                                    dataLabels: {
                                        enabled: true
                                    },
                                    xaxis: {
                                        categories: [
                                            @foreach($semboro as $item)
                                                '{{ $item->koordinator }}',
                                            @endforeach
                                        ],
                                    }
                                }).render();
                            });
                        </script>
                        <!-- End Bar Chart -->

                    </div>
                </div>
            </div>
        @endcan

        @can('karangsono-index')
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Karangsono</h5>

                        <!-- Bar Chart -->
                        <div id="karangsono"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#karangsono"), {
                                    series: [{
                                        name: "Jumlah ",
                                        data: [
                                            @foreach($karangsono as $item)
                                                {{ $item->jumlah }},
                                            @endforeach]
                                    }],
                                    chart: {
                                        type: 'bar',
                                        height: 500
                                    },
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 4,
                                            horizontal: false,
                                        }
                                    },
                                    dataLabels: {
                                        enabled: true
                                    },
                                    xaxis: {
                                        categories: [
                                            @foreach($karangsono as $item)
                                                '{{ $item->koordinator }}',
                                            @endforeach
                                        ],
                                    }
                                }).render();
                            });
                        </script>
                        <!-- End Bar Chart -->

                    </div>
                </div>
            </div>
        @endcan
    </div>

@endsection
