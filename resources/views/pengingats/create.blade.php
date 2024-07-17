@extends('layouts.userhome')

@section('content')
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Tambah Pengingat</h5>
                <form class="row g-3" method="POST" action="{{ route('pengingat.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Judul pengingat</label>
                        <div class="position-relative">
                            <input type="text" name="judul_pengingat"
                                class="form-control @error('judul_catatan') is-invalid @enderror" id="input13"
                                value="{{ old('judul_catatan') }}" placeholder="Judul" required>
                            <span class="position-absolute top-50 translate-middle-y"></span>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" cols="30" rows="2" placeholder="Deskripsi..."></textarea>
                    </div>
                    <div class="mb-md-12">
                        <label class="form-label">Pengingat</label>
                        <input name="tanggal" type="date" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Gambar</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                    {{-- <div class="col-md-12">
                        <label class="form-label">ID Catatan</label>
                        <input name="catatan_id" type="number" class="form-control">
                    </div> --}}
                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <a href="{{ route('pengingat.index') }}" class="btn btn-grd-danger px-4 text-light">Cancel</a>
                            <button type="submit" class="btn btn-grd-info px-4 text-light">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
