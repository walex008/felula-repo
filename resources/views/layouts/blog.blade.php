<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
        @yield('title')
    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('img/favicon.png')}}" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="{{asset('css/variables.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: ZenBlog - v1.1.0
    * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
    * Author: BootstrapMade.com
    * License: https:///bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{url("/")}}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>FelulaBlog</h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{url('/')}}">Blog</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li class="justify-content-lg-end">
                    @auth
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button class="mx-2 btn btn-info btn-sm">Logout</button>
                        </form>
                    @else
                        <a href="{{route('login')}}" class="mx-2 btn btn-success btn-sm">Login</a>
                    @endauth
                </li>
            </ul>
        </nav><!-- .navbar -->


        <div class="position-relative">
            <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
            <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
            <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

            <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
            <i class="bi bi-list mobile-nav-toggle"></i>

            <!-- ======= Search Form ======= -->
            <div class="search-form-wrap js-search-form-wrap">
                <form action="search-result.html" class="search-form">
                    <span class="icon bi-search"></span>
                    <input type="text" placeholder="Search" class="form-control">
                    <button class="btn js-search-close"><span class="bi-x"></span></button>
                </form>
            </div><!-- End Search Form -->

        </div>

    </div>

</header><!-- End Header -->

<main id="main">


    @yield('hero')



    <!-- ======= Post Grid Section ======= -->

    @yield('post_grid')

    <!-- ======= Culture Category Section ======= -->

    @yield('category')

    <!-- ======= Business Category Section ======= -->


    <!-- ======= Lifestyle Category Section ======= -->


</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">

            <div class="row g-5">
                <div class="col-lg-4">
                    <h3 class="footer-heading">About Felula</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid blanditiis omnis quae. Explicabo?</p>
                    <p><a href="#" class="footer-link-more">Learn More</a></p>
                </div>
                <div class="col-6 col-lg-2">
                    <h3 class="footer-heading">Navigation</h3>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Home</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Blog</a></li>
                        <li><a href="#}"><i class="bi bi-chevron-right"></i> Categories</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> About us</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Contact</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2"
                    <h3 class="footer-heading">Categories</h3>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Business</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Culture</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Sport</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Food</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Politics</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Celebrity</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Startups</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Travel</a></li>

                    </ul>
                </div>


            </div>
        </div>
    </div>

    <div class="footer-legal">
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <div class="copyright">
                        © Copyright <strong><span>Felula</span></strong>. All Rights Reserved
                    </div>

                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
{{--                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>--}}
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>

                </div>

            </div>

        </div>
    </div>

</footer>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('vendor/aos/aos.js')}}"></script>
<script src="{{asset('vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('js/main.js')}}"></script>

</body>

</html>
