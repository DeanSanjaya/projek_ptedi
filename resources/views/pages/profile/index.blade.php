@extends('templates.default')

@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
        <div class="row inbox-wrapper">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 border-end-lg">
                                <h4 class="card-title">Navigasi Profile</h4>
                                <div class="email-aside-nav collapse">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#">
                                                <i data-feather="user" class="icon-lg me-2"></i>
                                                Profile Saya
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" href="#">
                                                <i data-feather="lock" class="icon-lg me-2"></i>
                                                Email & Kata Sandi
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <h4 class="card-title text-center">Welcome, Amiah Burton !</h4>
                                <p class="tx-20 text-muted text-center">Informasi mengenai profil dan preferensi anda di seluruh layanan kami</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-2 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Navigasi Profile</h4>
                        <p>Profile Saya</p>
                        <p>Email & Sandi</p>
                    </div>
                </div>
            </div>
            <div class="col grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title text-center">Welcome, Amiah Burton</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
