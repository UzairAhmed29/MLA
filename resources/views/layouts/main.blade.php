<!doctype html>
<html lang="en">
<head>
<title>MLA | {{ isset($title) ? $title : 'Law Associates' }}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
<meta name="keywords" content="admin template, Oculux admin template, dashboard template, flat admin template, responsive admin template, web app, Light Dark version">
<meta name="author" content="GetBootstrap, design by: puffintheme.com">
<meta name="_token" content="{{csrf_token()}}" />
<link rel="icon" href="{{ asset('/assets/images/favicon.ico') }}" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/vivify.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css" integrity="sha512-TPigxKHbPcJHJ7ZGgdi2mjdW9XHsQsnptwE+nOUWkoviYBn0rAAt0A5y3B1WGqIHrKFItdhZRteONANT07IipA==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" />
<link rel="stylesheet" href="{{ asset('/assets/css/c3.min.css') }}"/>
<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('/assets/css/site.min.css') }}">
</head>
<body class="theme-cyan font-montserrat">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>
<!-- Theme Setting -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<div id="wrapper">
    <nav class="navbar top-navbar">
        <div class="container-fluid">

            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="/"><img src="{{ asset('/assets/images/icon.svg') }}" alt="Oculux Logo" class="img-fluid logo"></a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
                <ul class="nav navbar-nav">
                    <li class="p_blog"><a href="/" class="blog icon-menu" title="Blog">Blog</a></li>
                </ul>
            </div>
            
            <div class="navbar-right">
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <form method="POST" name="logout" action="{{ route('logout') }}">
                            @csrf
                            <li><button style="background-color: rgb(34 37 42);border: none;" type="submit"><i style="color:white;" class="icon-power"></i></button></li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <div class="progress-container"><div class="progress-bar" id="myBar"></div></div>
    </nav>
    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="/"><img src="{{ asset('/assets/images/icon.svg') }}" alt="Oculux Logo" class="img-fluid logo"><span>MLA</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div/<img src="{{ asset('/assets/images/user.png') }}" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ (auth()->user() !== null) ? auth()->user()->name : 'User' }}</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                        <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                        <li class="divider"></li>
                        <form method="POST" name="logout" action="{{ route('logout') }}">
                            @csrf
                            <li><button style="background-color: rgb(255 255 255);border: none;color: rgb(128 128 128);font-size: 14px;display: block;" type="submit">&nbsp;&nbsp;<i style="margin-right: 6px;" class="icon-power"></i>Logout</button></li>
                        </form>
                    </ul>
                </div>                
            </div>  
            @include('partials.sidebar')   
        </div>
    </div>
    @yield('content')   
</div>
<!-- Javascript -->
<script src="{{ asset('/assets/js/libscripts.bundle.js') }}"></script>
<script src="{{ asset('/assets/js/vendorscripts.bundle.js') }}"></script>
<script src="{{ asset('/assets/js/c3.bundle.js') }}"></script>
<script src="{{ asset('/assets/js/mainscripts.bundle.js') }}"></script>
<script src="https:////cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/hideseek/0.8.0/jquery.hideseek.js" integrity="sha512-gJGdXdLLX/qP0LShYHFSRzzMsUG1pIu92KfCGLpNVV6rF5FvB8nPgvqOhuoEFATwYE8NVSvpZr8FUGX+SBlRAg==" crossorigin="anonymous"></script>
<script src="{{ asset('/assets/js/index.js') }}"></script>
@yield('scripts')
@if(Session::has('success'))
    <script type="text/javascript">
            toastr.success("{{ Session::get('success') }}");
    </script>
    {{-- Info Tostr + Session flash --}}
@elseif(Session::has('info'))
    <script type="text/javascript">
            toastr.info("{{ Session::get('info') }}");
    </script>
    {{-- Warning Tostr + Session flash --}}
@elseif(Session::has('warning'))
    <script type="text/javascript">
            toastr.warning("{{ Session::get('warning') }}");
    </script>
    {{-- Error Tostr + Session flash --}}
@elseif(Session::has('error'))
    <script type="text/javascript">
            toastr.error("{{ Session::get('error') }}");
    </script>
{{-- End Session Flash --}}
@endif
</body>
</html>
