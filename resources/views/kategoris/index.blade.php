@extends('layouts.backend')

@section('content')
    <h6 class="mb-0 text-uppercase">Data tabel kategori</h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="col-lg-4">
                <a href="{{ route('kategori.create') }}" class="btn btn-grd-success px-5 raised d-flex gap-5 text-light">
                    <i class="material-icons-outlined">label</i>
                    Tambah kategori
                </a>
            </div>
            <table class="table mb-0 table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item->nama_kategori }}</td>
                            <form id="destroy-form" action="{{ route('kategori.destroy', $item->id) }}" method="POST"
                                class="d-none">
                                @csrf
                                @method('DELETE')

                                <td>
                                    <a href="{{ route('kategori.show', $item->id) }}" class="btn btn-grd-info gap-2 text-light"><i
                                            class="material-icons-outlined">search</i></a>

                                    <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-grd-warning gap-2 text-light"><i
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
