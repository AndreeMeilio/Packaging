@extends('app')

@section('main_content')
    @if (Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                role="tab" aria-controls="home" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                role="tab" aria-controls="profile" aria-selected="false">Catatan Perjalanan</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                role="tab" aria-controls="contact" aria-selected="false">Isi Data</button>
        </li>
        <li class="nav-item" role="presentation">
            <form action="{{ route("logout") }}" method="POST">
                @csrf
                <button class="nav-link" type="submit">Logout</button>
            </form>
        </li>
    </ul>
    <div class="container">
        <div class="tab-content" id="myTabContent">
            @include('perjalanan.dashboard')
            @include('perjalanan.data')
            @include('perjalanan.form')
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $("#dataTable").DataTable();
        });
    </script>
@endsection
