@section('title-web', 'Learning By Detikcom | Detail Page')
@extends('templates.main')
@section('content')
<div class="container">
    <div class="row h-100" style="padding-top: 5rem; padding-bottom: 10rem">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('training') }}">Training</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>
        @foreach ($result as $item)
        <div class="col-lg-4 col-md-6 mb-3">
            <div class="img-title-detail">
                <div class="bg-dark position-absolute top-0 right-0 px-2 py-1 text-light rounded m-2">
                    <span>{{ $item->duration }}</span>
                </div>
                <img src="{{ asset('storage/listtopik/' . $item->photo) }}" class="img-detail" alt="Gambar Detail">
            </div>
        </div>
        <div class="col-lg-8 col-md-6 mb-3">
            <h4>{{ $item->title }}</h4>
            <span>{{ $item->nama_kejuruan }}</span>
            <p class="fw-bold text-success">{{ $item->status }}</p>
            <p class="mt-2">{{ $item->descripton }}</p>
            <h6>Level : <span>{{ $item->level }}</span></h6>
            @if ($item->level == 'pemula')
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
            @elseif($item->level == 'menengah')
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
            @elseif($item->level == 'lanjutan')
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
            @endif
            <h6 class="mt-2">Mentor : {{ $item->instructor }}</h6>
            <div class="d-flex justify-content-between align-items-center">
                <h5>Rp {{ $item->price }}</h5>
                <button type="button" class="btn btn-outline-primary px-3">Beli</button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
