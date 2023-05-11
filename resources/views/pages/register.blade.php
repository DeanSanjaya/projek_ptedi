<!DOCTYPE html>
<html class="no-js" lang="en">
@include('templates.partials.head')

<style>
    img{
        transform: scale(1.05)
    }
    @media (max-width: 991px) {
        img {
            display: none;
        }
    }
</style>

<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">
                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <img style="height: 100%;" class="img-fluid"
                                        src="{{ asset('assets/onepage/img/Group.svg') }}" alt="">
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        {{-- <a href="#" class="noble-ui-logo d-block mb-2">Noble<span>UI</span></a>
                                        <h5 class="text-muted fw-normal mb-4">Create a free account.</h5> --}}
                                        <h2 class="mb-4 text-center">Register</h2>
                                        <form method="POST" class="forms-sample"
                                            action="{{ route('registersubmit') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Username</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Username" id="name" name="name"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label"> Email address</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" id="email" placeholder="Email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required id="password" autocomplete="password"
                                                    placeholder="Password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="password-confirm" class="form-label ">{{ __('Confirm Password') }}</label>
                    
                                              
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                
                                            </div> --}}
                                            <div>
                                                <button style="background-color:#002F49; border: 2px solid #002F49;"
                                                    type="submit" class="btn text-white me-2 mb-2 mb-md-0">
                                                    Sign up
                                                </button>
                                            </div>
                                            <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Already a
                                                user? <span style="color: blue"> Sign in</span>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('templates.partials.script')
</body>


</html>
