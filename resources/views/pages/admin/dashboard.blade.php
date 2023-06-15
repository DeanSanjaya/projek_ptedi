@extends('templates.default')

@section('content')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome {{ Auth::user()->name }}</h4>
            </div>
            {{-- <div class="d-flex align-items-center flex-wrap text-nowrap">
                <div class="input-group date datepicker wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                    <span class="input-group-text input-group-addon bg-transparent border-primary"><i data-feather="calendar"
                            class=" text-primary"></i></span>
                    <input type="text" class="form-control border-primary bg-transparent">
                </div>
                <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="printer"></i>
                    Print
                </button>
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                    Download Report
                </button>
            </div> --}}
        </div>

        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-2">Total USer</h6>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="mb-2">
                                            {{ $user }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-2">Total Toko</h6>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="mb-2">
                                            {{ $toko }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->

        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">

                    <div class="col-md-12  grid-margin stretch-card">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline mb-4">
                                    <h6 class="card-title mb-3">Profile</h6>
                                </div>
                                <div class="d-flex justify-content-center ">

                                    <div class="mb-3">
                                        <img src="{{ asset('storage/' . auth::user()->photo) }}"
                                            class="rounded-circle wd-200" alt="user">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center ">
                                    <div class="mb-2 text-center">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p>{{ auth::user()->address }}</p>
                                        <p>{{ auth::user()->phone }}</p>
                                    </div>


                                </div>
                                <div class="d-flex justify-content-center">

                                    <a href="{{ route('profile.index') }}" class="btn btn-primary" role="button"
                                        aria-disabled="true">Edit Profile</a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->


    </div>
@endsection
