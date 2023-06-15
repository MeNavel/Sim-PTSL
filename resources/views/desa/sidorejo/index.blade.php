@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nominatif Pendaftaran Sertifikat Tanah Desa Sidorejo</h5>
            @foreach($berkas as $item)
                {{ $item->no_berkas }}
            @endforeach
        </div>
    </div>
@endsection
