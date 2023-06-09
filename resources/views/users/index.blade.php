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
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $key => $user)
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                        <label class="badge bg-primary">{{ $v }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-info" href="{{ route('users.show', $user->id) }}"><i
                                            class="bi bi-info-circle"></i></a>
                                    <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}"><i
                                            class="bi-pencil-square"></i></a>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_{{ $user->id }}"><i
                                            class="bi-trash3"></i></button>
                                </div>
                                <div class="modal fade" id="delete_{{ $user->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi</h5>
                                                <button class="btn-close" data-bs-dismiss="modal" type="button"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin ingin menghapus akun?<h5 class="card-title">{{ $user->email }}</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal"
                                                    type="button">Close</button>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
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
            {!! $data->render() !!}
        </div>
    </div>
@endsection
