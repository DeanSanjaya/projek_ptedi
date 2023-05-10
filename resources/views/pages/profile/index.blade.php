@extends('templates.default')

@section('content')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-3 offset-lg-1 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Navigasi Profile</h4>
                        <div class="email-aside-nav collapse">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" href="{{ route('profile.index') }}">

                                        <i data-feather="user" class="icon-lg me-2"></i>
                                        Profile Saya
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" href="{{ route('email') }}">
                                        <i data-feather="lock" class="icon-lg me-2"></i>
                                        Email & Kata Sandi
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.store') }} " enctype="multipart/form-data">
                            @csrf
                            <div class="text-center">
                                <h4 class="card-title">Welcome, {{ auth::user()->name }}</h4>
                                <p class="tx-20 text-muted">Informasi mengenai profil dan preferensi anda di seluruh layanan
                                    kami</p>
                                <div class="profile-pic-div">
                                    <img id="photoold" class="my-4 rounded-circle wd-150"
                                        src="{{ asset('storage/' . auth::user()->photo) }}" class="img-fluid"
                                        alt="profile">
                                    <input style="display:none" class="form-control" type="file" id="image" name="image">
                                    <br>
                                    <label class="btn btn-outline-secondary" id="uploadBtn" class="p-1"
                                        for="image">Ganti Gambar</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" autocomplete="off"
                                    placeholder="Nama" value="{{ auth::user()->name }}">
                            </div>
                            <div class="mb-3">

                                <label for="telp" class="form-label">No Telepon</label>
                                <input type="text" class="form-control" id="telp" name="telp"
                                    value="{{ auth::user()->phone }}" placeholder="No Telepon">

                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" value="{{ auth::user()->address }}"
                                    id="address" name="address" autocomplete="off" placeholder="Alamat">
                            </div>
                            <div class="d-flex justify-content-around button">
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#photoold').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function() {
            readURL(this);
        });
    </script>
@endsection
