@extends('layouts.backend')

@section('content')
    <h6 class="mb-0 text-uppercase">Data Tabel User</h6>
<hr>
<div class="card">
    <div class="card-body">
        <table class="table mb-0 table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ route('user.show', $item->id) }}" class="btn btn-primary gap-2"><i class="material-icons-outlined">search</i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection