@extends('layouts.backend')

@section('content')
    <h6 class="mb-0 text-uppercase">Data tabel artikel </h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="col-lg-3">
                <a href="{{ route('artikel.create') }}" class="btn btn-grd-success px-5 raised d-flex gap-2 text-light">
                    <i class="material-icons-outlined">description</i>
                    Tambah artikel
                </a>
            </div>
            <table class="table mb-0 table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul artikel</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artikel as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item->judul_artikel }}</td>
                            <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                            <td>
                                <img src="{{ asset('/images/artikel/' . $item->image) }}" width="100">
                            </td>
                            <form id="destroy-form" action="{{ route('artikel.destroy', $item->id) }}" method="POST"
                                class="d-none">
                                @csrf
                                @method('DELETE')

                                <td>
                                    <a href="{{ route('artikel.show', $item->id) }}" class="btn btn-grd-info gap-2 text-light"><i
                                            class="material-icons-outlined">search</i></a>

                                    <a href="{{ route('artikel.edit', $item->id) }}" class="btn btn-grd-warning gap-2 text-light"><i
                                            class="material-icons-outlined">edit</i></a>

                                    <button type="submit" class="btn btn-grd-danger gap-2 text-light"><i
                                            class="material-icons-outlined">delete</i></button>
                                    {{-- <a href="{{ route('artikel.edit', $item->id) }}" class="btn btn-warning gap-2"><i
                                        class="material-icons-outlined">edit</i></a> --}}
                                </td>

                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
