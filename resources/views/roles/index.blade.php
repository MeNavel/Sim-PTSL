@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Kelola Akun</h5>

            <!-- Table with hoverable rows -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $role->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}"><i
                                            class="bi bi-info-circle"></i></a>
                                    <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}"><i
                                            class="bi-pencil-square"></i></a>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_{{ $role->id }}"><i
                                            class="bi-trash3"></i></button>
                                </div>
                                <div class="modal fade" id="delete_{{ $role->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi</h5>
                                                <button class="btn-close" data-bs-dismiss="modal" type="button"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin ingin menghapus perizinan?<h5 class="card-title">{{ $role->name }}</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal"
                                                    type="button">Close</button>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $roles->render() !!}
        </div>
    </div>
@endsection
