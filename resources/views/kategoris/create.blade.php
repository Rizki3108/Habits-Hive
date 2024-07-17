@extends('layouts.backend')

@section('content')
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Tambah Kategori</h5>
                <form class="row g-3" method="POST" action="{{ route('kategori.store') }}">
                    @csrf
                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Nama Kategori</label>
                        <div class="position-relative">
                            <input type="text" name="nama_kategori"
                                class="form-control @error('name') is-invalid @enderror" id="input13"
                                value="{{ old('name') }}" placeholder="Judul" required>
                            <span class="position-absolute top-50 translate-middle-y"></span>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <a href="{{ route('kategori.index') }}" class="btn btn-grd-danger px-4 text-light">Cancel</a>
                            <button type="submit" class="btn btn-grd-info px-4 text-light">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
