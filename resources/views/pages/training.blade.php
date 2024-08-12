@section('title-web', 'Learning By Detikcom | Training Page')
@extends('templates.main')
@section('content')
<section id="topik" class="py-4">
    <div class="container" style="padding-top: 5rem">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('homeindex') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">List Training</li>
            </ol>
        </nav>
        <div class="row justify-content-between align-items-center mb-4">
            <div class="col-9">
                <h4>List Topik Training</h4>
            </div>
            <div class="col-3">
                <form action="{{ route('search') }}" method="GET" id="searchdivisi">
                    <select name="value" class="form-select" aria-label="Default select example"
                        onchange="document.getElementById('searchdivisi').submit()">
                        <option selected>Sort By Divisi</option>
                        <option value="">All Divisi</option>
                        @foreach ($divisi as $item)
                        <option value="{{ $item->nama_kejuruan }}">{{ $item->nama_kejuruan }}</option>
                        @endforeach
                    </select>
            </div>
            </form>
        </div>
        <div class="row align-items-center">
            @foreach ($listtopik as $item)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/listtopik/' . $item->photo) }}" class="card-img-top" alt="Card">
                    <div class="card-body">
                        <h6 class="fw-normal">
                            {{ $item->nama_kejuruan }}
                        </h6>
                        <h5 class="card-title">
                            {{ $item->title }}
                        </h5>
                        <span class="text-primary">
                            {{ $item->status }}
                        </span>
                        @if ($item->price == 0 || $item->price == null)
                        <h5>Free</h5>
                        @else
                        <h5>Rp {{ $item->price }}</h5>
                        @endif
                        <a href="{{ route('detailtraining', [$item->id]) }}" class="btn btn-primary">Join</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
