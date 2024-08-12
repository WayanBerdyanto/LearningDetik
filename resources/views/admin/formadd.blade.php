@section('title-web', 'Learning By Detikcom | Dashboard Admin Page')
@extends('templates.main')
@section('content')
<div class="container">
    <div class="row" style="padding-top: 5rem">
        <h5 class="mb-3 text-center">Add Topic</h5>
        <div class="col-md-12 mb-5">
            <form action="{{ route('admin.posttopic') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Topic Title</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="desc" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="divisi" class="form-label">Pilih Divisi</label>
                    <select class="form-select" name="id_kejuruan" id="divisi">
                        @foreach ($kejuruan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kejuruan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" name="status" id="status">
                        <option selected value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="price" required>
                </div>
                <div class="mb-3">
                    <label for="level" class="form-label">Level</label>
                    <select class="form-select" name="level" id="level">
                        <option selected value="pemula">Pemula</option>
                        <option value="menengah">Menengah</option>
                        <option value="lanjutan">Lanjutan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="duration" class="form-label">Duration</label>
                    <input type="number" name="duration" class="form-control" id="duration" required>
                </div>
                <div class="mb-3">
                    <label for="instructor" class="form-label">Instructor</label>
                    <input type="text" name="instructor" class="form-control" id="instructor" required>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" name="photo" class="form-control" id="photo">
                </div>
                <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
