@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Daftar Hak Akses Yang Diberikan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Kelola Akun</a></li>
                <li class="breadcrumb-item active">Detail Akun</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Hak akses yang diberikan</h5>
            <ol class="list-group list-group-numbered">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Nama</div>
                    {{ ($user->name) }}
                  </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold">Hak akses akun</div>
                    {{ ($user->getRoleNames()->first()) }}
                  </div>
                </li>
              <br>
            <ul class="list-group">
                @if (!empty($rolePermissions))
                    @foreach ($rolePermissions as $v)
                        <li class="list-group-item"><i class="bi bi-check-circle me-1 text-success"></i>{{  $v  }}</li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endsection
