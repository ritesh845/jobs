<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <title>Physiotherapy Job</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<!-- CSS here -->
    {{-- <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}"> --}}
    
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/price_rangs.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link href="{{ asset('css/font-size.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    /*Top Search*/
.topsearchwrap {
}
.topsearchwrap h4 {
    background: #263bd6;
    margin-bottom: 15px;
    color: #fff;
    font-size: 30px;
    font-weight: 700;
    padding: 12px 20px;
    text-transform: uppercase;
}
.topsearchwrap h5 {
    background: #333;
    margin-bottom: 15px;
    color: #fff;
    font-size: 30px;
    font-weight: 700;
    padding: 12px 20px;
    text-transform: uppercase;
}
.catelist li a {
    display: block;
    margin: 10px 0;
    position: relative;
    padding-left: 15px;
    color: #000;
    font-weight: 600
}
.catelist li a:hover {
    color: #263bd6;
}
.catelist li a:before {
    position: absolute;
    left: 0;
    content: '\f0da';
    font-family: 'FontAwesome';
    font-weight: 400;
}
.catelist li span {
    color: #6aca00;
}


</style>
</head>

<body>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('img/logo.png')}}" alt="" / >
                </div>
            </div>
        </div>
    </div>
    <header>
        <!-- Header Start -->
       <div class="header-area header-transparrent shadow-sm">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="{{url('/')}}"><img src="{{asset('img/logo.png')}}" alt="" width="250" /></a>
                            </div>  
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu" style="width: 97%">
                                    <nav class="d-none d-lg-block pull-right">
                                        <ul id="navigation">
                                            <li class="active"><a href="{{url('/')}}">Home</a></li>

                                            <li><a href="{{route('find_jobs')}}">Find a Jobs</a></li>

                                            <li><a href="#">Search </a></li>


                                            @guest
                
                                            <li><a href="{{route('login')}}">Login</a></li>      
                                            
                                            <li><a href="#">Register</a>
                                                <ul class="submenu">
                                                    <li><a href="{{url('register')}}/?type=post_job">Employeer</a></li>
                                                    <li><a href="{{url('register')}}/?type=post_resume">Jobseeker</a></li>   
                                                </ul>
                                            </li>
                                          
                                            @else

                                            <li><a href="#"><img src="{{asset('img/user_img.png')}}" alt="" class="userimg" width="30" /></a>
                                                <ul class="submenu">
                                                    <li><a href="{{route('home')}}">Dashboard</a></li>
                                                    <li><a href="{{route('employeer.profile',auth::user()->id)}}">Profile</a></li>   

                                                    <li>
                                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">Logout</a>
                                                    </li>   
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>

                                                </ul>
                                            </li>   

                          
                                            @endguest                           



                                           {{--  <li><a href="#">Page</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Elements</a></li>
                                                    <li><a href="job_details.html">job Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li> --}}
                                        </ul>
                                    </nav>
                                </div>          
                                <!-- Header-btn -->
                                {{-- <div class="header-btn d-none f-right d-lg-block">
                                    <a href="#" class="btn head-btn1">Register</a>
                                    <a href="#" class="btn head-btn2">Login</a>
                                </div> --}}
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
    </header>