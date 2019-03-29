<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Polish') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Squad Theme Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Squad Theme Fonts -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
    
    <!-- Squad Theme CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">

    <!-- =======================================================
      Theme Name: Squadfree
      Theme URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
      Primary Author: BootstrapMade
      Primary Author URL: https://bootstrapmade.com
      Secondary Author: Bobbyaxe61
      Secondary Author URL: https://github.com/bobbyaxe61
    ======================================================= -->
  </head>

  <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <!-- Preloader -->
    <div id="preloader">
      <div id="load"></div>
    </div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
              <i class="fa fa-bars"></i>
          </button>
          <a class="navbar-brand" href="{{ url('/#intro') }}">
            <h1>{{ config('app.name', 'Polish') }}</h1>
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            @guest
              <li><a href="{{ url('/#intro') }}">Home</a></li>
              <li><a href="{{ url('/#about') }}">About</a></li>
              <li><a href="{{ url('/#service') }}">Service</a></li>
              <li><a href="{{ url('/#contact') }}">Contact</a></li>
              <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
              @if (Route::has('register'))
                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
              @endif
            @else
              <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
              <li><a href="{{ url('/uploads') }}">Uploads</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ url('/#contact') }}">Contact Us</a></li>
                  <li>
                      <a href="{{ route('logout') }}" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </li>
                </ul>
              </li>
            @endguest
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>



    <!-- Section: content -->
    <section id="content" class="home-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="wow bounceInUp" data-wow-delay="0.5s">
              <div class="team boxed-grey">
                <div class="inner">
                   @yield('content')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Section: content -->



    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <div class="wow shake" data-wow-delay="0.4s">
              <div class="page-scroll marginbot-10">
                <a href="#content" id="totop" class="btn btn-circle">
  							 <i class="fa fa-angle-double-up animated"></i>
  						  </a>
              </div>
            </div>
            <span>&copy; {{ config('app.name', 'Polish') }} All Rights Reserved.</span>
            <div class="credits">
              Designed By <a href="https://github.com/bobbyaxe61">Bobbyaxe61</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Squad Theme Core JavaScript Files -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <!-- Squad Theme Custom Theme JavaScript -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/contactform.js') }}"></script>

  </body>
</html>