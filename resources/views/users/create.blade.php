@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Akun</h5>
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        {{ $error }}
                        <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
                    </div>
                @endforeach
            @endif
            {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="name">Nama</label>
                <div class="col-sm-10">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="email">Email</label>
                <div class="col-sm-10">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="password">Password</label>
                <div class="col-sm-10">
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="confirm-password">Konfirmasi Password</label>
                <div class="col-sm-10">
                    {!! Form::password('confirm-password', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Hak akses akun</label>
                <div class="col-sm-10">
                    {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2"></label>
                <div class="col-sm-10">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
