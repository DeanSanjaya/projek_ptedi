@extends('templates.default')

@section('content')
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
                                    <a class="nav-link d-flex align-items-center" href="{{route('profile')}}">
                                        <i data-feather="user" class="icon-lg me-2"></i>
                                        Profile Saya
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" href="{{route('email')}}">
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
                        <div class="text-center">
                            <h4 class="card-title">Welcome, Amiah Burton</h4>
                            <p class="tx-20 text-muted">Informasi mengenai profil dan preferensi anda di seluruh layanan
                                kami</p>
                            <div class="profile-pic-div">
                                <img id="photo" class="my-4 rounded-circle" style="height: 150px;"
                                    src="{{ asset('assets/onepage/img/profile.jpg ') }}" class="img-fluid" alt="profile">
                                <input style="display: none" type="file" id="file">
                                <br>
                                <label style="cursor : pointer; border: 1px solid grey;" id="uploadBtn" class="p-1"
                                    for="file">Ganti Gambar</label>
                            </div>
                        </div>
                        <form class="forms-sample">
                            <div class="mb-3">
                                <label for="exampleInputName1" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="exampleInputName1" autocomplete="off"
                                    placeholder="Nama" value="Amiah Burton">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputTelp1" class="form-label">No Telepon</label>
                                <input type="tel" class="form-control" id="exampleInputTelp1" placeholder="No Telepon">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputAlamat1" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="exampleInputAlamat1" autocomplete="off"
                                    placeholder="Alamat">
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
@endsection
