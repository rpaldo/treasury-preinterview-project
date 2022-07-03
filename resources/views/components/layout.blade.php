<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link type="text/css" href="{{ asset('css/material-kit.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
</head>
<body class="presentation-page bg-gray-200">
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container">
        <a class="navbar-brand" href="{{ URL::to('/') }}" rel="tooltip" title="Designed and Coded by Creative Tim"
           data-placement="bottom">
            My Blog
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
        </button>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ms-auto">
                @guest

                    <li class="nav-item ms-lg-auto">
                        <a class="nav-link nav-link-icon me-2"
                           href="{{ URL::to('/login') }}">Login
                        </a>
                    </li>
                    <li class="nav-item my-auto ms-3 ms-lg-0">
                        <a href="{{ URL::to('/register') }}"
                           class="btn btn-sm  bg-gradient-info  mb-0 me-1 mt-2 mt-md-0">REGISTER</a>
                    </li>
                @else
                    @if(auth()->user()->role == 'admin')
                        <li class="nav-item mx-2">
                            <a class="nav-link nav-link-icon me-2"
                               href="{{ URL::to('/users') }}">Users
                            </a>
                        </li>
                    @else
                        <li class="nav-item mx-2">
                            <a class="nav-link nav-link-icon me-2"
                               href="{{ URL::to('/posts') }}">Posts
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <span class="nav-link nav-link-icon">
                            Welcome, {{ auth()->user()->name }}!
                            <a class="m-lg-1 text-xs"
                               href="{{ URL::to('/logout') }}">(Logout)
                            </a>
                        </span>
                    </li>
                    <li class="nav-item">

                    </li>
                @endguest
            </ul>
        </div>
    </div>
    </div>
</nav>

{{ $slot }}
<!--   Core JS Files   -->
<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/plugins/prism.min.js')}}"></script>
<script src="{{asset('js/plugins/highlight.min.js')}}"></script>
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>
</html>
