@section('title-web', 'Learning By Detikcom | Dashboard Admin Page')
@extends('templates.main')
@section('content')
<div class="container">
    <div class="row" style="padding-top: 5rem">
        <h5>List Topic Training</h5>
        <div class="d-flex justify-content-between align-items-center mt-2">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search Divisi" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
            <a href="{{ route('admin.formaddtopic') }}" class="btn btn-outline-primary">
                <i class="bi bi-plus-circle-fill"></i>
            </a>
        </div>
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover mt-2">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Price</th>
                            <th scope="col">Level</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listtopik as $item)
                        <tr>
                            <th scope="row">
                                {{ $loop->iteration }}
                            </th>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->level }}</td>
                            <td>{{ $item->duration }}</td>
                            <td>
                                <a href="{{ route('admin.deletetopic', [$item->id]) }}" class="btn btn-danger">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                                <a href="{{ route('admin.formupdatetopic', [$item->id]) }}" class="btn btn-primary">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="{{ route('admin.detailtopic', [$item->id]) }}" class="btn btn-info">
                                    <i class="bi bi-info-lg"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $listtopik->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
