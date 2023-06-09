@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Izin akses {{ $role->name }}</h5>
        <ul class="list-group">
            @if (!empty($rolePermissions))
                @foreach ($rolePermissions as $v)
                    <li class="list-group-item"><i class="bi bi-check-circle me-1 text-success"></i>{{ $v->name }}</li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
@endsection
