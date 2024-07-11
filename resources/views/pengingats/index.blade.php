@extends('layouts.userhome')

@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">User</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Pengingat    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="col-lg-3">
        <a href="{{ route('catatan.create') }}" class="btn btn-grd btn-grd-info px-6 raised d-flex gap-4">
            <i class="material-icons-outlined">add</i>Tambah Pengingat</button>
        </a>
    </div>

    <!-- Tampilkan Catatan dalam Bentuk Kartu -->
    <div class="row mt-4">
        @foreach ($catatan as $item)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        @if ($item->image)
                            <img src="{{ asset('images/catatan/' . $item->image) }}" class="card-img-top" alt="Note Image">
                        @endif
                        <h5 class="card-title">{{ $item->judul_catatan }}</h5>
                        <p class="card-text">{{ $item->deksripsi }}</p>
                        <p class="card-text">{{ $item->tanggal }}</p>
                        <form id="destroy-form" action="{{ route('catatan.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('catatan.show', $item->id) }}"
                                    class="btn btn-grd btn-grd-info btn-circle raised rounded-circle d-flex gap-2 wh-48"><i
                                        class="material-icons-outlined">search</i></a>

                                <a href="{{ route('catatan.edit', $item->id) }}"
                                    class="btn btn-grd btn-grd-warning btn-circle raised rounded-circle d-flex gap-2 wh-48"><i
                                        class="material-icons-outlined">edit</i></a>

                                <button type="submit"
                                    class="btn btn-grd btn-grd-danger btn-circle raised rounded-circle d-flex gap-2 wh-48">
                                    <i class="material-icons-outlined">delete</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
