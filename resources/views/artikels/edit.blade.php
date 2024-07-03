@extends('layouts.backend')

@section('content')
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Edit Artikel</h5>
                <form class="row g-3" method="POST" action="{{ route('artikel.update', $artikel->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Judul Artikel</label>
                        <div class="position-relative">
                            <input type="text" name="judul_artikel" class="form-control id="input13" 
                            value="{{$artikel->judul_artikel}}">
                            <span class="position-absolute top-50 translate-middle-y"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" cols="30" rows="2">{{$artikel->deskripsi}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Gambar</label><br>
                        <img src="{{asset('images/artikel/' . $artikel->image)}}" width="100">
                        <input name="image" type="file" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <a href="{{ route('artikel.index') }}" class="btn btn-grd-danger px-4 text-light">Cancel</a>
                            <button type="submit" class="btn btn-grd-info px-4 text-light">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
