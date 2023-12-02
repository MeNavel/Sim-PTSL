@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Daftar Akun Terverifikasi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Kelola Akun</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Kelola Akun</h5>

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

            <a href="{{ route('users.create') }}" role="button" class="btn btn-primary mb-2"><i
                    class="bi bi-file-earmark-plus me-1"></i>Tambah Akun</a>


            <table class="table table-bordered data-table" width="100%">
                <thead>
                <tr style="vertical-align: middle;">
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Hak Akses</th>
                    <th scope="col">Action</th>
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
                            ajax: "{{ route('users.index') }}",
                            columns: [
                                {
                                    data: 'name',
                                    name: 'name',
                                    className: "dt-head-center"
                                },
                                {
                                    data: 'email',
                                    name: 'email',
                                    width: "5%",
                                    className: "dt-head-center"
                                },
                                {
                                    orderable: false,
                                    width: "10%",
                                    data: 'roles',
                                    name: 'roles',
                                    className: "dt-head-center dt-body-center"
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
                                title: 'Yakin Ingin Menghapus Akun dengan nama ' + nama + ' ?',
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
                                        url: '{{ route('users.destroy', '') }}/' + id,
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
            </table>

            <!-- Table with hoverable rows -->
            {{--            <table class="table table-hover">--}}
            {{--                <thead>--}}
            {{--                    <tr>--}}
            {{--                        <th>No</th>--}}
            {{--                        <th>Name</th>--}}
            {{--                        <th>Email</th>--}}
            {{--                        <th>Roles</th>--}}
            {{--                        <th>Action</th>--}}
            {{--                    </tr>--}}
            {{--                </thead>--}}

            {{--                <tbody>--}}
            {{--                    @foreach ($data as $key => $user)--}}
            {{--                        <tr>--}}
            {{--                            <th scope="row">{{ ++$i }}</th>--}}
            {{--                            <td>{{ $user->name }}</td>--}}
            {{--                            <td>{{ $user->email }}</td>--}}
            {{--                            <td>--}}
            {{--                                @if (!empty($user->getRoleNames()))--}}
            {{--                                    @foreach ($user->getRoleNames() as $v)--}}
            {{--                                        <label class="badge bg-primary">{{ $v }}</label>--}}
            {{--                                    @endforeach--}}
            {{--                                @endif--}}
            {{--                            </td>--}}
            {{--                            <td>--}}
            {{--                                <div class="btn-group">--}}
            {{--                                    <a class="btn btn-info" href="{{ route('users.show', $user->id) }}"><i--}}
            {{--                                            class="bi bi-info-circle"></i></a>--}}
            {{--                                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}"><i--}}
            {{--                                            class="bi-pencil-square"></i></a>--}}
            {{--                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_{{ $user->id }}"><i--}}
            {{--                                            class="bi-trash3"></i></button>--}}
            {{--                                </div>--}}
            {{--                                <div class="modal fade" id="delete_{{ $user->id }}" tabindex="-1">--}}
            {{--                                    <div class="modal-dialog modal-dialog-centered">--}}
            {{--                                        <div class="modal-content">--}}
            {{--                                            <div class="modal-header">--}}
            {{--                                                <h5 class="modal-title">Konfirmasi</h5>--}}
            {{--                                                <button class="btn-close" data-bs-dismiss="modal" type="button"--}}
            {{--                                                    aria-label="Close"></button>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="modal-body">--}}
            {{--                                                Yakin ingin menghapus akun?<h5 class="card-title">{{ $user->email }}</h5>--}}
            {{--                                            </div>--}}
            {{--                                            <div class="modal-footer">--}}
            {{--                                                <button class="btn btn-secondary" data-bs-dismiss="modal"--}}
            {{--                                                    type="button">Close</button>--}}
            {{--                                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}--}}
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
            {{--            </table>--}}
            {{--            {!! $data->render() !!}--}}
        </div>
    </div>
@endsection
