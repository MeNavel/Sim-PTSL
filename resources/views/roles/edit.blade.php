@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Hak Akses</h5>
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        {{ $error }}
                        <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif
            {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
            <div class="row mb-3">
                <label class="col-sm-1 col-form-label" for="name">Nama</label>
                <div class="col-sm-11">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-1 col-form-label" for="email">Hak Akses</label>
                <div class="col-sm-11">
                    <ul class="list-group">
                        @foreach ($permission as $value)
                            <li class="list-group-item">
                                {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name form-check-input me-1']) }}
                                {{ $value->name }}
                            </li>
                        @endforeach
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row mt-3 mb-3">
                <label class="col-sm-2"></label>
                <div class="col-sm-10">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
