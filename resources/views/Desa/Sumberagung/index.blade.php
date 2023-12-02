@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Daftar Permohonan Sertifikat Tanah Desa Sumberagung</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Sumberagung</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pengajuan TA 2023</h5>

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

            @can('sumberagung-create')
                <a href="{{ route('sumberagung.create') }}" role="button" class="btn btn-primary mb-2"><i
                        class="bi bi-file-earmark-plus me-1"></i>Tambah Berkas</a>
            @endcan

            <table class="table table-bordered data-table" width="100%">
                <thead>
                <tr style="vertical-align: middle;">
                    <th scope="col">Action</th>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor Berkas</th>
                    <th scope="col">NIB</th>
                    <th scope="col">Luas Ukur</th>
                    <th scope="col">Luas Permohonan</th>
                    <th scope="col">Beda Luas</th>
                    <th scope="col">Tahun 1</th>
                    <th scope="col">Nama 1</th>
                    <th scope="col">Tahun 2</th>
                    <th scope="col">Nama 2</th>
                    <th scope="col">Peralihan 2</th>
                    <th scope="col">Tahun 3</th>
                    <th scope="col">Peralihan 3</th>
                </tr>
                </thead>
            </table>
        </div>
        <script type="text/javascript">
            $(function () {
                $.fn.dataTable.ext.errMode = 'throw';
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollX: true,
                    order: [
                        [1, 'desc']
                    ],
                    ajax: "{{ route('sumberagung.index') }}",
                    columns: [
                        {
                            data: 'action',
                            name: 'action',
                            width: "10%",
                            orderable: false,
                            searchable: false,
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            data: 'id',
                            name: 'id',
                            width: "5%",
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            data: 'nama',
                            name: 'nama',
                            className: "dt-head-center"
                        },
                        {
                            orderable: false,
                            width: "5%",
                            data: 'no_berkas',
                            name: 'no_berkas',
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            orderable: false,
                            width: "5%",
                            data: 'nib',
                            name: 'nib',
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            orderable: false,
                            width: "5%",
                            data: 'luas_ukur',
                            name: 'luas_ukur',
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            orderable: false,
                            data: 'luas_permohonan',
                            width: "5%",
                            name: 'luas_permohonan',
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            data: 'beda_luas',
                            width: "5%",
                            name: 'beda_luas',
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            data: 'tahun_1',
                            name: 'tahun_1',
                            className: "dt-head-center dt-body-center",
                            width: "5%"
                        },
                        {
                            data: 'nama_1',
                            name: 'nama_1',
                            className: "dt-head-center dt-body-center",
                        },
                        {
                            data: 'tahun_2',
                            name: 'tahun_2',
                            className: "dt-head-center dt-body-center",
                            width: "5%"
                        },
                        {
                            data: 'nama_2',
                            name: 'nama_2',
                            className: "dt-head-center dt-body-center",
                        },
                        {
                            data: 'dasar_2',
                            name: 'dasar_2',
                            className: "dt-head-center dt-body-center",
                        },
                        {
                            data: 'tahun_3',
                            name: 'tahun_3',
                            className: "dt-head-center dt-body-center",
                            width: "5%"
                        },
                        {
                            data: 'dasar_3',
                            name: 'dasar_3',
                            className: "dt-head-center dt-body-center",
                        },
                    ],
                });

                $(document).on('click', '.delete-btn', function () {
                    var id = $(this).data('id');
                    var nama = $(this).data('nama');
                    Swal.fire({
                        title: 'Yakin ingin menghapus data nominatif ' + id + ' dengan nama ' + nama + '?',
                        text: "Data yang dihapus tidak dapat dikembalikan",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus Data!'
                    }).then((result) => {
                        if (result.value) {
                            var id = $(this).data('id');
                            $.ajax({
                                url: '{{ route('sumberagung.destroy', '') }}/' + id,
                                type: 'DELETE',
                                data: {
                                    '_token': $('meta[name="csrf-token"]').attr('content'),
                                    'id': id
                                },
                                success: function (data) {
                                    table.draw();
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: data.data,
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                },
                                error: function (data) {
                                    Swal.fire(
                                        'Error ' + data.status + ' ' + data.statusText + '!',
                                        data.responseJSON.message,
                                        'error'
                                    );
                                }
                            });
                        }
                    });
                });
            });
        </script>
    </div>
@endsection
