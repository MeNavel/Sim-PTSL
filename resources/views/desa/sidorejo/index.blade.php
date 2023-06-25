@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nominatif Pendaftaran Sertifikat Tanah Desa Sidorejo</h5>
            <a href="{{ route('sidorejo.create') }}" role="button" class="btn btn-primary mb-2"><i
                    class="bi bi-file-earmark-plus me-1"></i>Tambah Berkas</a>
            <table class="table table-bordered data-table" width="100%">
                <thead>
                <tr style="vertical-align: middle;">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor Berkas</th>
                    <th scope="col">NIB</th>
                    <th scope="col">Luas Ukur</th>
                    <th scope="col">Luas Permohonan</th>
                    <th scope="col">Beda Luas</th>
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
                    ajax: "{{ route('sidorejo.index') }}",
                    columns: [
                        {
                            data: 'id',
                            name: 'id',
                            width: "1%",
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            data: 'nama',
                            name: 'nama',
                            orderable: false,
                            className: "dt-head-center dt-body-left"
                        },
                        {
                            orderable: true,
                            width: "7%",
                            data: 'no_berkas',
                            name: 'no_berkas',
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            width: "7%",
                            data: 'nib',
                            name: 'nib',
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            width: "7%",
                            data: 'luas_ukur',
                            name: 'luas_ukur',
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            width: "7%",
                            data: 'luas_permohonan',
                            name: 'luas_permohonan',
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            width: "7%",
                            data: 'beda_luas',
                            name: 'beda_luas',
                            className: "dt-head-center dt-body-center"
                        },
                        {
                            data: 'action',
                            name: 'action',
                            width: "6%",
                            orderable: false,
                            searchable: false,
                            className: "dt-head-center dt-body-center"
                        },
                    ],
                });

                // $(document).on('click', '.delete-btn', function () {
                //     var id = $(this).data('id');
                //     Swal.fire({
                //         title: 'Yakin Ingin Menghapus NIK ' + id + ' ?',
                //         text: "Data yang dihapus tidak dapat dikembalikan",
                //         icon: 'warning',
                //         showCancelButton: true,
                //         confirmButtonColor: '#3085d6',
                //         cancelButtonColor: '#d33',
                //         confirmButtonText: 'Ya, Hapus Data!'
                //     }).then((result) => {
                //         if (result.value) {
                //             var id = $(this).data('id');
                //             $.ajax({
                //                 url: "pemohon/destroy/" + id,
                //                 type: 'post',
                //                 data: {
                //                     '_token': $('meta[name="csrf-token"]').attr('content'),
                //                     'id': id
                //                 },
                //                 success: function (data) {
                //                     table.draw();
                //                     Swal.fire({
                //                         position: 'mid',
                //                         icon: 'success',
                //                         title: 'Data Berhasil Dihapus',
                //                         showConfirmButton: false,
                //                         timer: 1000
                //                     })
                //                 },
                //                 error: function () {
                //                     Swal.fire(
                //                         'Error!',
                //                         'Error deleting data',
                //                         'error'
                //                     );
                //                 }
                //             });
                //         }
                //     });
                // });
            });
        </script>
    </div>
@endsection
