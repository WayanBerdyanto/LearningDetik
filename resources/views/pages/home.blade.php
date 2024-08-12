@section('title-web', 'Learning By Detikcom | Landing Page')
@extends('templates.main')
@section('content')

<div class="container">
    <div class="row" style="padding-top: 5rem">
        <div class="col-md-12">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img src="https://learning.detik.com/pluginfile.php/366/course/overviewfiles/foto-dan-jutnalistik.jpg"
                            class="d-block carousel-size" alt="Picture 1">
                    </div>
                    <div class="carousel-item active">
                        <img src="https://learning.detik.com/pluginfile.php/382/course/overviewfiles/fix%20foto%20dan%20jutnalistik%20%281%29.png"
                            class="d-block carousel-size" alt="Picture 2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://learning.detik.com/pluginfile.php/371/course/overviewfiles/potret-jutnalistik.jpg"
                            class="d-block carousel-size" alt="Picture 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="text-center mt-4 mb-4">
            <h4 class="text-primary fw-bold">Upgrade Dirimu, Upgrade Karirmu! 🚀</h4>
            <p>Training bersama detikcom kapan pun dan dimana pun! Raih mimpi mu dengan mengikuti pelatihan bersama
                detikcom</p>
            <a href="{{ route('training') }}" class="btn btn-primary rounded">Mulai</a>
        </div>

    </div>

    <section id="topik" class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>List Topik Training</h4>
                <a href="{{ route('training') }}" class="nav-link fw-bold">See All &nbsp; <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="row align-items-center">
                @foreach ($listtopik as $item)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="bg-dark position-absolute top-0 right-0 px-2 py-1 text-light rounded m-2">
                            <span>{{ $item->duration }}</span>
                        </div>
                        <img src="{{ asset('storage/listtopik/' . $item->photo) }}" class="card-img-top" alt="Card">
                        <div class="card-body">
                            <h6 class="fw-normal">
                                {{ $item->nama_kejuruan }}
                            </h6>
                            <h6 class="card-title">
                                {{ $item->title }}
                            </h6>
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
            {{ $listtopik->links('pagination::bootstrap-5') }}
        </div>
    </section>
</div>


@endsection
