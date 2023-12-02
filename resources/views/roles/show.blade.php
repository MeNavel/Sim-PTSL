@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Daftar Izin Akses Yang Diberikan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Data Akses</a></li>
                <li class="breadcrumb-item active">Detail Hak Akses</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Izin akses {{ $role->name }}</h5>
            <ul class="list-group">
                @if (!empty($rolePermissions))
                    @foreach ($rolePermissions as $v)
                        <li class="list-group-item"><i class="bi bi-check-circle me-1 text-success"></i>{{ $v->name }}
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@endsection
