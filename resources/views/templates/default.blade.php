<!DOCTYPE html>
<html class="no-js" lang="en">
@include('templates.partials.head')


<body>
    {{-- <div id="pre-loader">
        <img src="{{ asset ('assets/user/images/loader.gif')}}" alt="Loading..." />
    </div> --}}
    <div class="main-wrapper">
        {{-- sidebar --}}
        @include('templates.partials.sidebar')
        {{-- end sidebar --}}

        <div class="page-wrapper">
            <!-- navbar -->
            @include('templates.partials.navbar')
            <!-- End navbar -->

            <!-- Content -->
            @yield('content')
            <!-- End content -->

            <!--Footer-->
            @include('templates.partials.footer')
            <!--End Footer-->
        </div>

        <!--Scoll Top-->
        {{-- <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span> --}}
        <!--End Scoll Top-->

        @include('templates.partials.script')
    </div>
</body>


</html>
