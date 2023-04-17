<!DOCTYPE html>
<html class="no-js" lang="en">
@include('templates.partials.head')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i data-feather="alert-circle"></i> <strong> {{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i data-feather="alert-circle"></i> <strong> {{ session('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    </div>
@endif


<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">
                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="auth-side-wrapper">

                                    </div>
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="noble-ui-logo d-block mb-2">Noble<span>UI</span></a>
                                        <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                                        <form class="forms-sample" method="POST" action="{{ route('loginsubmit') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email address</label>
                                                <input type="email"
                                                    class="form-control  @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}" id="email" name="email"
                                                    placeholder="Email">
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
                                                    id="password" name="password" autocomplete="current-password"
                                                    placeholder="Password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            {{-- <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="authCheck">
                                                <label class="form-check-label" for="authCheck">
                                                    Remember me
                                                </label>
                                            </div> --}}
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-primary text-white me-2 mb-2 mb-md-0">
                                                    Sign up
                                                </button>
                                            </div>
                                            <a href="{{ route('register') }}" class="d-block mt-3 text-muted">
                                                Not a user? <span style="color: blue"> Sign up</span></a>
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
