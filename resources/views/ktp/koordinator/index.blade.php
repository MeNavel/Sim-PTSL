@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Koordinator</h5>

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

            @can('ktp-create')
                <a href="{{ route('koordinator.create') }}" role="button" class="btn btn-primary mb-2"><i
                        class="bi bi-person-plus me-1"></i> Tambah Koordinator</a>
            @endcan

            <table class="table table-bordered data-table" width="100%">
                <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Desa</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Action</th>
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
                    ajax: "{{ route('koordinator.index') }}",
                    columns: [
                        {
                            orderable: true,
                            width: "20%",
                            data: 'nama',
                            name: 'nama',
                            className: "dt-head-center dt-body-left"
                        },
                        {
                            orderable: true,
                            width: "10%",
                            data: 'desa',
                            name: 'desa',
                            className: "dt-head-center dt-body-center",
                        },
                        {
                            orderable: false,
                            width: "10%",
                            data: 'jabatan',
                            name: 'jabatan',
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            data: 'action',
                            name: 'action',
                            width: "2%",
                            orderable: false,
                            searchable: false,
                            className: "dt-head-center dt-body-center"
                        },
                    ],
                });

                $(document).on('click', '.delete-btn', function () {
                    var id = $(this).data('id');
                    var nama = $(this).data('nama');
                    Swal.fire({
                        title: 'Yakin Ingin Menghapus Koordinator ' + nama + ' ?',
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
                                url: '{{ route('koordinator.destroy', '') }}/'+id,
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
