@extends('layouts.userhome')

@section('content')
    <div class="col-lg-3">
        <a href="{{ route('catatan.create') }}" class="btn btn-grd btn-grd-info px-4 raised d-flex gap-4">
            <i class="material-icons-outlined">add</i>Tambah Catatan</button>
        </a>
    </div>

    <!-- Tampilkan Catatan dalam Bentuk Kartu -->
    <div class="row mt-4">
        @foreach ($catatan as $item)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul_catatan }}</h5>
                        <p class="card-text">{{ $item->deksripsi }}</p>
                        <p class="card-text">{{ $item->tanggal }}</p>
                        <img src="{{ asset('images/catatan/' . $item->image) }}" class="card-img-top" alt="...">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
