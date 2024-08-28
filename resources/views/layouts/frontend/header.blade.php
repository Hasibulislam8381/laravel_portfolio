
<!Doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hasibul Islam Himel portfolio</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/img/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/animate.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('public/frontend/css/fontawesome.min.css') }}">
     --}}
     <link rel="stylesheet" href="{{ asset('public/frontend/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/js/odometer.min.js') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/swipper.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/main.css') }}">
</head>

<body>

    <div class="page-wrapper home-3" data-background="{{ asset('public/frontend/img/bg/page-bg-1.jpg') }}">

        <!-- PRELOADER -->
        <div id="preloader">
            <div class="loader_line"></div>
        </div>
        <!-- /PRELOADER -->
        <!-- header-start -->
        <div class="bostami-header-area mb-30 z-index-5">
            <div class="container">
                <div class="bostami-header-wrap">
                    <div class="row">

                        <!-- logo -->
                        <div class="col-6">
                            <div class="bostami-header-logo">
                                <a class="site-logo" href="https://bostami-bootstrap.ibthemespro.com/index.html">
                                    <img src="assets/img/logo/logo-2.png" alt="">
                                </a>
                            </div>
                        </div>

                        <!-- menu btn -->
                        <div class="col-6">
                            <div class="bostami-header-menu-btn text-right mb-0">
                                <div class="dark-btn dark-btn-stored dark-btn-icon">
                                    <i class="fa-solid fa-moon"></i>
                                    <i class="fa-solid fa-sun"></i>
                                </div>
                                <div class="menu-btn toggle_menu d-lg-none">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- mobile menu -->
                <div class="mobile-menu-wrap">
                    <div class="mobile-menu mobile_menu_3">
                    </div>
                </div>

            </div>
        </div>
        <!-- header-end -->

        <div class="container z-index-3">
            <div class="row">     
                  <!-- parsonal-info-start -->
  <div class="col-xxl-4 col-xl-4 col-lg-4">
    <div class="bostami-parsonal-info-area">
        <div class="bostami-parsonal-info-wrap">

            <!-- img -->
            <div class="bostami-parsonal-info-img">
                <img src="{{  $generalInfo->footer_logo }}" alt="avatar">
            </div>

            <!-- name -->
            <h4 class="bostami-parsonal-info-name">
                <a href="#">Hasibul Islam Himel</a>
            </h4>
            <span class="bostami-parsonal-info-bio mb-15">{{ $generalInfo->site_name }}</span>

            <!-- socail link -->
            <ul class="bostami-parsonal-info-social-link mb-30">
                <li>
                    <a href="{{$generalInfo->facebook}}" class="facebook" target="__blank">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="{{$generalInfo->github}}" class="twitter" target="__blank">
                        <i class="fa-brands fa-github"></i>

                    </a>
                </li>
                <li>
                    <a href="{{$generalInfo->linkedin}}" class="linkedin">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                   
                </li>
                <li>
                    <a href="https://wa.me/{{$generalInfo->whatsapp}}?text={{ urlencode('Hello, I would like to discuss...') }}" target="_blank" rel="noopener noreferrer" class="whatsapp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    
                    
                </li>
            </ul>

            <!-- contact -->
            <div class="bostami-parsonal-info-contact mb-30">
                <div class="bostami-parsonal-info-contact-item phone">
                    <div class="icon">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                    </div>
                    <div class="text">
                        <span>Phone</span>
                        <p>{{ $generalInfo->phone }}</p>
                    </div>
                </div>


                <div class="bostami-parsonal-info-contact-item email">
                    <div class="icon">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="text">
                        <span>Email</span>
                       <p> {{$generalInfo->email  }}</p>
                           
                      
                    </div>
                </div>

                <div class="bostami-parsonal-info-contact-item location">
                    <div class="icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="text">
                        <span>Location</span>
                        <p>{{ $generalInfo->address }}</p>
                    </div>
                </div>

                <div class="bostami-parsonal-info-contact-item calendar">
                    <div class="icon">
                        <i class="fa-solid fa-cake-candles"></i>
                    </div>
                    <div class="text">
                        <span>Birthday</span>
                        <p>August 14, 1999</p>
                    </div>
                </div>
            </div>

            <!-- cv button -->
            @if($generalInfo->pdf_file)
            
            <div class="bostami-parsonal-info-btn">
                <a class="btn-2 circle" target="__blank"  href="{{ $generalInfo->pdf_file }}">
                    <span class="icon">
                        <i class="fa-regular fa-circle-down"></i>
                    </span>
                    download cv
                </a>
            </div>
            @endif

        </div>
    </div>
</div>
<!-- personal-info-end -->
                     <!-- about-page-start -->
   <div class="col-xxl-8 col-xl-8 col-lg-8">

    <!-- main-menu-start -->
    <div class="text-right">
        <div class="bostami-main-menu-wrap">
            <nav class="bastami-main-menu main_menu_3">
                <ul>
                    <li class="{{ request()->routeIs('index') ? 'active' : '' }}">
                        <a href="{{ route('index') }}">
                            <span>
                                <i class="fa-solid fa-address-card"></i>
                            </span>
                            about
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('resume') ? 'active' : '' }}">
                        <a href="{{ route('resume') }}">
                            <span>
                                <i class="fa-solid fa-file"></i>
                            </span>
                            Resume
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('work') ? 'active' : '' }}">
                        <a href="{{ route('work') }}">
                            <span>
                                <i class="fa-solid fa-briefcase"></i>
                            </span>
                            Works
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('blog') ? 'active' : '' }}">
                        <a href="{{ route('blog') }}">
                            <span>
                                <i class="fa-brands fa-hive"></i>
                            </span>
                            Blogs
                        </a>
                    </li>
                    <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                        <a href="{{ route('contact') }}">
                            <span>
                                <i class="fa-solid fa-address-book"></i>
                            </span>
                            contact
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    
    <!-- main-menu-end -->