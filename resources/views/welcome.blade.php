@if(Session::has('isLoggedIn'))
    
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('/assets/images/favicon.ico') }}" type="image/x-icon">
        <title>Majeed Law Associates</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                /* text-align: center;
                 */
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);
.buttons {
  display: flex;
  flex-direction: column;
  height: 100%;
  text-align: center;
}
@media (min-width: 600px) {
  .container {
    flex-direction: row;
    justify-content: space-between;
  }
}
.btn {
  color: #636b6f;
  cursor: pointer;
  font-size: 16px;
  font-weight: 400;
  line-height: 45px;
  margin: 0 0 2em;
  max-width: 160px;
  position: relative;
  text-decoration: none;
  text-transform: uppercase;
  width: 100%;
}
@media (min-width: 600px) {
  .btn {
    margin: 0 1em 2em;
  }
}
.btn:hover {
  text-decoration: none;
}
.btn-1 {
  font-weight: 100;
}
.btn-1 svg {
  height: 45px;
  left: 0;
  position: absolute;
  top: 0;
  width: 100%;
}
.btn-1 rect {
  fill: none;
  stroke: #636b6f;
  stroke-width: 2;
  stroke-dasharray: 422, 0;
  transition: all 0.35s linear;
}
.btn-1:hover {
  background: rgba(225, 51, 45, 0);
  font-weight: 900;
  letter-spacing: 1px;
}
.btn-1:hover rect {
  stroke-width: 5;
  stroke-dasharray: 15, 310;
  stroke-dashoffset: 48;
  transition: all 1.35s cubic-bezier(0.19, 1, 0.22, 1);
}


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @auth
                @php $link = url('/home'); $title = 'Home'; @endphp
            @else
                @php $link = route('login'); $title = 'Login'; @endphp
            @endauth

            <img src="{{ asset('/assets/images/login.png') }}" width="750">
            <div class="content">
                <div class="title m-b-md">
                    Majeed Law Associates
                </div>
                <section class="buttons">
                    <a href="{{ $link }}" class="btn btn-1">
                        <svg>
                          <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                        </svg>
                        {{ $title }}
                    </a>    
                </section>
            </div>
        </div>
    </body>
</html>

@else
<!doctype html>
<html lang="en">

<head>
<title>MLA | Security Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
<meta name="author" content="GetBootstrap, design by: puffintheme.com">

<link rel="icon" href="{{ asset('/assets/images/favicon.ico') }}" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/vivify.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.min.css" integrity="sha512-TPigxKHbPcJHJ7ZGgdi2mjdW9XHsQsnptwE+nOUWkoviYBn0rAAt0A5y3B1WGqIHrKFItdhZRteONANT07IipA==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" />

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

<div class="pattern">
    <span class="red"></span>
    <span class="indigo"></span>
    <span class="blue"></span>
    <span class="green"></span>
    <span class="orange"></span>
</div>

<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="auth_brand">
            <a class="navbar-brand" href="javascript:void(0);"><img src="{{ asset('/assets/images/icon.svg') }}" width="30" height="30" class="d-inline-block align-top mr-2" alt="">Majeed Law Associates</a>
        </div>
        <div class="card">
            <div class="body">
                <form class="form-auth-small m-t-20" action="{{ route('security-post') }}" method="POST" name="security-post">
                    @csrf
                    <div class="form-group">
                        <label for="signin-password" style="float: left"> Security Password</label>
                        <input name="security_password" type="password" required class="form-control round"  id="signin-password" value="" placeholder="Password">
                        @if(Session::has('error'))
                            <span style="margin: 5px 0px; float: left; color: white">{{ Session::get('error') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary btn-round btn-block">Proceed</button>
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->
    
<script src="{{ asset('/assets/js/libscripts.bundle.js') }}"></script>    
<script src="{{ asset('/assets/js/vendorscripts.bundle.js') }}"></script>
<script src="{{ asset('/assets/js/mainscripts.bundle.js') }}"></script>
</body>
</html>

@endif
