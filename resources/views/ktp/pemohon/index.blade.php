@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Kartu Tanda Penduduk</h5>

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

            <table class="table table-bordered data-table" width="100%">
                <thead>
                <tr>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
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
                    ajax: "{{ route('pemohon.index') }}",
                    columns: [
                        {
                            data: 'id',
                            name: 'id',
                            width: "2%",
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            orderable: true,
                            width: "20%",
                            data: 'nama',
                            name: 'nama',
                            className: "dt-head-center dt-body-left"
                        },
                        {
                            orderable: false,
                            width: "10%",
                            data: 'tanggal_lahir',
                            name: 'tanggal_lahir',
                            className: "dt-head-center dt-body-center",
                        },
                        {
                            orderable: false,
                            width: "10%",
                            data: 'jenis_kelamin',
                            name: 'jenis_kelamin',
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            orderable: false,
                            data: 'alamat',
                            name: 'alamat',
                            className: "dt-head-center dt-body-left"
                        },
                        {
                            data: 'action',
                            name: 'action',
                            width: "1%",
                            orderable: false,
                            searchable: false,
                            className: "dt-head-center dt-body-center"
                        },
                    ],
                });

                $(document).on('click', '.delete-btn', function() {
                    var id = $(this).data('id');
                    Swal.fire({
                        title: 'Yakin Ingin Menghapus NIK '+id+' ?',
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
                                url: "pemohon/destroy/"+id,
                                type: 'post',
                                data: {
                                    '_token': $('meta[name="csrf-token"]').attr('content'),
                                    'id': id
                                },
                                success: function(data) {
                                    table.draw();
                                    Swal.fire({
                                        position: 'mid',
                                        icon: 'success',
                                        title: 'Data Berhasil Dihapus',
                                        showConfirmButton: false,
                                        timer: 1000
                                    })
                                },
                                error: function() {
                                    Swal.fire(
                                        'Error!',
                                        'Error deleting data',
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
