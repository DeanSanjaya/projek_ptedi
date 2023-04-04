@if(session('success'))
    {{-- <div style="top: 90px !important" class="alert alert-success alert-dismissable fade show text-center">
        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
        {{session('success')}}
    </div> --}}
    <div style="top: 80px !important" class="alert alert-success alert-dismissible fade show" role="alert">
        <i data-feather="alert-circle"></i> <strong> {{session('success')}}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    </div>
@endif


@if(session('error'))
    {{-- <div style="top: 90px !important" class="alert alert-danger alert-dismissable fade show text-center">
        <button class="close" data-dismiss="alert" aria-label="Close">×</button>
        {{session('error')}}
    </div> --}}
    <div style="top: 80px !important" class="alert alert-danger alert-dismissible fade show" role="alert">
        <i data-feather="alert-circle"></i> <strong> {{session('error')}}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    </div>
@endif