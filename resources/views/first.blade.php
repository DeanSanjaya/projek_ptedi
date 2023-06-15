<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />


    <title>ERPEDII</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/onepage/img/edi.jpg') }}" rel="icon">
    <link href="{{ asset('assets/onepage/img/edi.jpg') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/onepage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/onepage/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/onepage/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/onepage/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/onepage/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/onepage/css/style.css') }}" rel="stylesheet">

    {{-- AOS CDN --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="#" class="logo"><img src="{{ asset('assets/onepage/img/logo_transparant.png') }}"
                    alt="Logo Perusahaan" class="img-fluid"></a>
            <!-- Uncomment below if you prefer to use text as a logo -->
            <!-- <h1 class="logo"><a href="index.html">ERPEDII</a></h1> -->
            <!-- .navbar -->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#services">Service</a></li>
                    <li><a class="nav-link scrollto" href="#packages">Package</a></li>
                    <li><a class="nav-link scrollto" href="#footer">Contact Us</a></li>
                    {{-- <button type="button" class="btn btn-primary">Login</button> --}}
                    @auth
                        @if (Auth::check())
                            <a href="{{ route('main') }}" class="btn">Dashboard</a>
                        @else
                            <a href="{{ route('logout') }}" class="btn">Logout</a>
                        @endif
                    @else
                        <button type="button" class="btn p-0"><a href="{{ route('login') }}">Login</a></button>
                        {{-- <a href="{{route('login')}}" style=" color:white; padding-left: 45px" class="btn btn-primary">Login</a> --}}
                    @endauth
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div data-aos="fade-right"
                    class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>A <span class="better">BETTER</span> WAY TO GROW YOUR CREATIVE <span
                            class="bisnis">BUSINESS</span></h1>
                    <h2>Manage your business with application to get faster and better </h2>
                    <div><a href="#package" class="btn-get-started scrollto">Get Started</a></div>
                </div>
                <div data-aos="fade-left" class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="{{ asset('assets/onepage/img/bisnis.png ') }}" class="img-fluid" alt="computer">
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    {{-- Start #main --}}
    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container-fluid">
                <div class="row">
                    <div class="garis offset-8 col-4">
                    </div>
                </div>
            </div>
            <div class="body container">
                <div class="row">
                    <div data-aos="fade-right"
                        class="left col-lg-6 text-center d-flex flex-column justify-content-center">
                        <h1>Control your business with Our Service</h1>
                        <h4>The only platform you need to run your business: <br>
                            integrated, simple and loved by millions of happy users.</h4>
                    </div>
                    <div data-aos="fade-left" class="right col-lg-6">
                        <div class="row">
                            <div class="kiri col-6">
                                <div class="kotak">
                                    <p class='text-center'>Manajemen Barang</p>
                                </div>
                                <div class="detail text-center">
                                    <p>Admin dan karyawan dapat mengelola barang yang sudah disimpan</p>
                                </div>
                                <div class="kotak">
                                    <p class='text-center'>Produksi Stok</p>
                                </div>
                                <div class="detail text-center">
                                    <p>Admin dan karyawan dapat memproduksi barang sesuai dengan komponen yang ada</p>
                                </div>
                                <div class="kotak">
                                    <p class='text-center'>Karyawan</p>
                                </div>
                                <div class="detail text-center">
                                    <p>Admin dapat membuat akun karyawan yang bekerja ditokonya masing-masing</p>
                                </div>
                            </div>
                            <div class="kanan col-6">
                                <div class="kotak">
                                    <p class='text-center'>Pembelian Stok</p>
                                </div>
                                <div class="detail text-center">
                                    <p>Admin dan karyawan dapat membeli barang berdasarkan data daftar pemasok</p>
                                </div>
                                <div class="kotak">
                                    <p class='text-center'>Daftar Pemasok</p>
                                </div>
                                <div class="detail text-center">
                                    <p>Admin dan keryawan dapat mengelola data perusahaan yang mensupply barang</p>
                                </div>
                                <div class="kotak">
                                    <p class='text-center'>Kasir</p>
                                </div>
                                <div class="detail text-center">
                                    <p>Admin dan karyawan dapat menggunakan kasir untuk memudahkan melakukan perhitungan transaksi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Section -->

        {{-- Start Packages --}}
        <section id="packages" class="packages">
            <div class="container-fluid">
                <div class="row">
                    <div class="garis col-4">
                    </div>
                </div>
            </div>
            <div class="container">
                <h2 class="text-center p-5">Let’s choose our packages with our best price</h2>
            </div>
            <div class="body container-fluid">
                <div class="container">
                    <div class="bungkus row">
                        <div data-aos="fade-up" class="col-lg-3">
                            <div class="kotak">
                                <div class="py-3 mx-3">
                                    <h2 class="text-center">Basic</h2>
                                    <p class="text-center"> Usaha kecil yang membutuhkan kemudahan operasional lengkap
                                    </p>
                                </div>
                            </div>
                            <div class="tombol text-light d-flex justify-content-center align-items-center">
                                <h3>Rp000.000.000</h3>
                            </div>
                        </div>
                        <div data-aos="fade-up" class="col-lg-3">
                            <div class="kotak">
                                <div class="py-3 mx-3">
                                    <h2 class="text-center">Business</h2>
                                    <p class="text-center">Untuk usaha berkembang yang membutuhkan fitur lengkap</p>
                                </div>
                            </div>
                            <div class="tombol text-light d-flex justify-content-center align-items-center">
                                <h3>Rp000.000.000</h3>
                            </div>
                        </div>
                        <div data-aos="fade-up" class="col-lg-3">
                            <div class="kotak">
                                <div class="py-3 mx-3">
                                    <h2 class="text-center">Professional</h2>
                                    <p class="text-center">Untuk usaha maju yang membutuhkan fitur otomasi</p>
                                </div>
                            </div>
                            <div class="tombol text-light d-flex justify-content-center align-items-center">
                                <h3>Rp000.000.000</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Packages --}}
    </main>
    <!-- End #main -->

    <!-- Start Footer -->
    <footer id="footer">
        <div class="bg-1">
            <br>
            <div class="bg-2">
                <div class="container">
                    <h1>Contact Us</h1>
                    <div class="email">
                        <i class="bi bi-envelope-fill"></i>
                        <p>marketing@edi-indonesia.co.id</p>
                    </div>
                    <div class="phone">
                        <i class="bi bi-telephone-fill"></i>
                        <p>+6221 650 5829</p>
                    </div>
                    <div class="text col text-end">
                        <h1>Follow Us</h1>
                        <div class="social-links">
                            <a target="_blank" href="https://www.linkedin.com/company/pt-edi-indonesia/mycompany/"><i
                                    class="bi bi-linkedin"></i></a>
                            <a target="_blank"
                                href="https://twitter.com/ediindonesia?ref_src=twsrc%5Etfw%7Ctwcamp%5Eembeddedtimeline%7Ctwterm%5Eprofile%3Aediindonesia&ref_url=http%3A%2F%2Fedi-indonesia.co.id%2F"><i
                                    class="bi bi-twitter"></i></a>
                            <a target="_blank" href="https://www.facebook.com/ptedii"><i
                                    class="bi bi-facebook"></i></a>
                            <a target="_blank"
                                href="https://www.instagram.com/ediindonesia/?utm_source=ig_profile_share&igshid=1fbc9jpabc2xc"><i
                                    class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/onepage/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/onepage/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/onepage/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/onepage/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/onepage/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/onepage/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/onepage/js/main.js') }}"></script>

    {{-- AOS Script --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
        });
    </script>
</body>

</html>
