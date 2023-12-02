@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Daftar Perizinan Yang Bisa Digunakan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Data Akses</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Akses</h5>
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

            <a href="{{ route('roles.create') }}" role="button" class="btn btn-primary mb-2"><i
                    class="bi bi-file-earmark-plus me-1"></i>Tambah Hak Akses</a>
            <table class="table table-bordered data-table" width="100%">
                <thead>
                <tr style="vertical-align: middle;">
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>

                <script type="text/javascript">
                    $(function () {
                        $.fn.dataTable.ext.errMode = 'throw';
                        var table = $('.data-table').DataTable({
                            processing: true,
                            serverSide: true,
                            scrollX: true,
                            order: [
                                [0, 'desc']
                            ],
                            ajax: "{{ route('roles.index') }}",
                            columns: [
                                {
                                    data: 'name',
                                    name: 'name',
                                    className: "dt-head-center"
                                },
                                {
                                    data: 'action',
                                    name: 'action',
                                    width: "10%",
                                    orderable: false,
                                    searchable: false,
                                    className: "dt-head-center dt-body-center"
                                },
                            ],
                        });

                        $(document).on('click', '.delete-btn', function () {
                            var nama = $(this).data('nama');
                            Swal.fire({
                                title: 'Yakin Ingin Menghapus Role Dengan Nama ' + nama + ' ?',
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
                                        url: '{{ route('roles.destroy', '') }}/' + id,
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


                {{--                <tbody>--}}
                {{--                    @foreach ($roles as $key => $role)--}}
                {{--                        <tr>--}}
                {{--                            <th scope="row">{{ ++$i }}</th>--}}
                {{--                            <td>{{ $role->name }}</td>--}}
                {{--                            <td>--}}
                {{--                                <div class="btn-group">--}}
                {{--                                    <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}"><i--}}
                {{--                                            class="bi bi-info-circle"></i></a>--}}
                {{--                                    <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}"><i--}}
                {{--                                            class="bi-pencil-square"></i></a>--}}
                {{--                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_{{ $role->id }}"><i--}}
                {{--                                            class="bi-trash3"></i></button>--}}
                {{--                                </div>--}}
                {{--                                <div class="modal fade" id="delete_{{ $role->id }}" tabindex="-1">--}}
                {{--                                    <div class="modal-dialog modal-dialog-centered">--}}
                {{--                                        <div class="modal-content">--}}
                {{--                                            <div class="modal-header">--}}
                {{--                                                <h5 class="modal-title">Konfirmasi</h5>--}}
                {{--                                                <button class="btn-close" data-bs-dismiss="modal" type="button"--}}
                {{--                                                    aria-label="Close"></button>--}}
                {{--                                            </div>--}}
                {{--                                            <div class="modal-body">--}}
                {{--                                                Yakin ingin menghapus perizinan?<h5 class="card-title">{{ $role->name }}</h5>--}}
                {{--                                            </div>--}}
                {{--                                            <div class="modal-footer">--}}
                {{--                                                <button class="btn btn-secondary" data-bs-dismiss="modal"--}}
                {{--                                                    type="button">Close</button>--}}
                {{--                                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}--}}
                {{--                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
                {{--                                                {!! Form::close() !!}--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </td>--}}
                {{--                        </tr>--}}
                {{--                    @endforeach--}}
                {{--                </tbody>--}}
            </table>
        </div>
    </div>
@endsection
