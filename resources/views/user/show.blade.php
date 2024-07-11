@extends('layouts.backend')

@section('content')
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Lihat Detail Catatan</h5>
                <form class="row g-3" method="POST" action="{{ route('catatan.store') }}">
                    @csrf
                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Nama User</label>
                        <div class="position-relative">
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="input13" class="form-label">Email</label>
                        <div class="position-relative">
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <a href="{{ route('user.index') }}" class="btn btn-grd-danger px-4 text-light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
