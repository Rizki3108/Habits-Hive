@extends('layouts.backend')

@section('content')
    <h6 class="mb-0 text-uppercase">Data Tabel User</h6>
<hr>
<div class="card">
    <div class="card-body">
        <div class="col-lg-3">
            <a href="{{ route('user.create') }}" class="btn btn-success px-4 raised d-flex gap-5">
                <i class="material-icons-outlined">account_circle</i>
                Tambah User
            </a>
        </div>
        <table class="table mb-0 table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Is Admin ?</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->isAdmin ? 'Admin' : 'User' }}</td>
                    <td>
                        <a href="{{ route('user.show', $item->id) }}" class="btn btn-primary gap-2"><i class="material-icons-outlined">search</i></a>
                        <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning gap-2"><i class="material-icons-outlined">edit</i></a>
                        <a class="btn ripple btn-danger gap-2" href="#" onclick="event.preventDefault();
                            document.getElementById('destroy-form').submit();">
                            <i class="material-icons-outlined">delete</i>
                        </a>

                        <form id="destroy-form" action="{{ route('user.destroy', $item->id) }}"
                            method="POST" class="d-none">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection