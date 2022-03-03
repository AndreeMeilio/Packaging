@extends('app')

@section('main_content')
    @if (Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get("error") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container mt-5">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" name="nik" class="form-control" id="nik" placeholder="Nik">
            </div>
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap">
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <input class="btn btn-primary" type="submit" name="login_as" value="Saya Pengguna Baru">
                    </div>
                    <div class="col-6">
                        <input class="btn btn-primary float-end" type="submit" name="login_as" value="Masuk">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
