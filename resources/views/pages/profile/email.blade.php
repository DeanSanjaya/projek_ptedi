@extends('templates.default')

@section('content')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>

        {{-- <div class="row">
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
                                <p class="tx-20 text-muted text-center">Informasi mengenai profil dan preferensi anda di
                                    seluruh layanan kami</p>
                                <img src="{{ asset('assets/onepage/img/profile.jpg ') }}" class="img-fluid" alt="profile">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

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
                        <form class="forms-sample" action="{{route('email.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" autocomplete="off"
                                    value="{{auth::user()->email}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" autocomplete="off"
                                    placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <label for="confirmpassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" autocomplete="off"
                                    placeholder="Confirm Password">
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
