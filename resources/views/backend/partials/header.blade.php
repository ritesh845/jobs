<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title','Dashboard')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('backend/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('backend/vendors/jquery-bar-rating/css-stars.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/font-awesome/css/font-awesome.min.css')}}" />

    <link rel="stylesheet" href="{{asset("css/datepicker.css")}}">
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="{{asset('backend/css/demo_2/style.css')}}" />
    {{-- <link rel="stylesheet" href="{{asset("/css/font-size.css")}}"> --}}
    
    <!-- End layout styles -->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
      .select2-container--default .select2-selection--multiple{
        padding-top: 5px !important;
        padding-bottom: 14px !important;

      }
      .select2-container--default .select2-selection--multiple .select2-selection__choice{
        font-size: 0.900rem !important;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_horizontal-navbar.html -->
      <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
          <div class="container">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo" href="{{url('/')}}">
                <img src="{{asset('img/logo.png')}}" alt="logo" />
                 {{-- PHYSIO JOBS --}}
                {{-- <span class="font-12 d-block font-weight-light">Responsive Dashboard </span> --}}
              </a>
              <a class="navbar-brand brand-logo-mini" href="{{url('/')}}">
                <img src="{{asset('img/logo.png')}}" alt="logo" />
                {{-- PHYSIO JOBS --}}
              </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
           
              <ul class="navbar-nav navbar-nav-right ml-0">
                 <li class="nav-item dropdown ml-3">
                <a class="nav-link" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="fa fa-bell-o" style="position: absolute;"></i><span class="text-danger font-weight-semibold" style="position: relative;top: -14px; left: 11px">{{ count(Auth::user()->unreadNotifications) !=0 ? count(Auth::user()->unreadNotifications) : ''}}</span>
                </a>
                @if(count(Auth::user()->unreadNotifications) !=0)
                  <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <h6 class="px-3 py-3 font-weight-semibold mb-0">Notifications ({{count(Auth::user()->unreadNotifications)}})</h6>
                    <div class="dropdown-divider"></div>
                      @foreach(Auth::user()->unreadNotifications as $notification)

                      <a class="dropdown-item preview-item" href="{{route('notification_read',$notification['id'])}}">
                        <div class="preview-thumbnail">
                          <div class="preview-icon bg-success">
                            <i class="mdi mdi-calendar"></i>
                          </div>
                        </div>
                        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                          <h6 class="preview-subject font-weight-normal mb-0">{{$notification['data']['title']}}</h6>
                          <p class="text-muted m-1">{{Str::limit($notification['data']['message'],50, $end = '...') }} </p>
                          <p class="text-gray ellipsis mb-0"> {{$notification->created_at->diffForHumans()}} </p>
                        </div>
                      </a>
                      @endforeach
                    <div class="dropdown-divider"></div>
                    {{-- <h6 class="p-3 font-13 mb-0 text-primary text-center">View all notifications</h6> --}}
                  </div>

                @endif
              </li>

                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                      <img src="{{asset('img/user_img.png')}}" alt="image" />
                    </div>
                    <div class="nav-profile-text">
                      <p class="text-black font-weight-semibold m-0">{{Auth::user()->name}}</p>
                      <span class="font-13 online-color">online <i class="mdi mdi-chevron-down"></i></span>
                    </div>
                  </a>
                  <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                   {{--  <a class="dropdown-item" href="#">
                      <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a> --}}
                    {{-- <div class="dropdown-divider"></div> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                      <i class="mdi mdi-logout mr-2 text-primary"></i> Signout 
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>

                  </div>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                <span class="mdi mdi-menu"></span>
              </button>
            </div>
          </div>
        </nav>
        <nav class="bottom-navbar">
          <div class="container">
              <ul class="nav page-navigation">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('home')}}">
                    <i class="mdi mdi-compass-outline menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                  </a>
                </li>

                

                @role('employeer')

                <li class="nav-item">
                  <a class="nav-link" href="{{route('employeer.profile',Auth::user()->id)}}">
                    <i class="mdi mdi-compass-outline menu-icon"></i>
                    <span class="menu-title">Profile</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('postjob.index')}}">
                    <i class="mdi mdi-compass-outline menu-icon"></i>
                    <span class="menu-title">List Job Posted</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('postjob.create')}}" class="nav-link">
                    <i class="mdi mdi-account-multiple menu-icon"></i>
                    <span class="menu-title">Post Job</span>
                  </a>

                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('search_resume.index')}}">
                    <i class="mdi mdi-clipboard-text menu-icon"></i>
                    <span class="menu-title">Search Resume</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('applied_resume')}}">
                    <i class="mdi mdi-clipboard-text menu-icon"></i>
                    <span class="menu-title">Applied Resume</span>
                  </a>
                </li>
             
                <li class="nav-item">
                  <a class="nav-link">
                  
                  </a>
                </li>
                @endrole

                @role('job_seeker')

                  <li class="nav-item">
                    <a class="nav-link" href="{{route('jobseeker.profile',Auth::user()->id)}}">
                      <i class="mdi mdi-compass-outline menu-icon"></i>
                      <span class="menu-title">Profile</span>
                    </a>
                  </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{route('applied_job')}}">
                        <i class="mdi mdi-clipboard-text menu-icon"></i>
                        <span class="menu-title">Applied Jobs</span>
                      </a>
                    </li>
                     <li class="nav-item">
                      <a class="nav-link" href="">
                        <i class="mdi mdi-clipboard-text menu-icon"></i>
                        <span class="menu-title">Saved Jobs</span>
                      </a>
                    </li>
                @endrole

                @role('super_admin')
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.employeer')}}">
                      <i class="mdi mdi-compass-outline menu-icon"></i>
                      <span class="menu-title">Employeer List</span>
                    </a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.jobseeker')}}">
                      <i class="mdi mdi-compass-outline menu-icon"></i>
                      <span class="menu-title">Jobseeker List</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.job_post')}}">
                      <i class="mdi mdi-compass-outline menu-icon"></i>
                      <span class="menu-title">Job Post</span>
                    </a>
                  </li>
                @endrole




              {{-- <li class="nav-item">
              <a href="https://www.bootstrapdash.com/demo/plus-free/documentation/documentation.html" class="nav-link" target="_blank">
              <i class="mdi mdi-file-document-box menu-icon"></i>
              <span class="menu-title">Docs</span></a>
              </li> --}}
              {{-- <li class="nav-item">
              <div class="nav-link d-flex">
              
                <a class="text-white" href="{{url('/')}}"><i class="mdi mdi-home-circle"></i></a>
              </div>
              </li> --}}
              </ul>
            </div>
        </nav>
      </div>
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">