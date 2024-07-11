@extends('layouts.userhome')

@section('content')
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Lihat Detail Catatan</h5>
                <form class="row g-3" method="POST" action="{{ route('catatan.store') }}">
                    @csrf
                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Judul catatan</label>
                        <div class="position-relative">
                            <input type="text" name="judul_catatan" class="form-control id="input13"
                                value="{{ $catatan->judul_catatan }}" disabled>
                            <span class="position-absolute top-50 translate-middle-y"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" cols="30" rows="2" disabled>{{ $catatan->deksripsi }}</textarea>
                    </div>
                    <div class="mb-md-12">
                        <label class="form-label">Pengingat</label>
                        <input name="pengingat" type="date" class="form-control" value="{{ $catatan->tanggal }}"
                            disabled>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Gambar</label><br>
                        <img src="{{ asset('/images/catatan/' . $catatan->image) }}" width="100">
                    </div>
                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <a href="{{ route('catatan.index') }}" class="btn btn-grd-danger px-4 text-light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
