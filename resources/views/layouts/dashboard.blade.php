<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{elixir('css/app.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

    <!-- Script in body, to avoid Vue cant find elem warning-->
    <script src="{{ elixir('js/app.js') }}"></script>
    <!-- Scripts -->

    <!--nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>
            </div>
        </div>
    </nav-->

                <!--Injected Header and Search Bar-->

                <!-- Navigation -->
                <div class="ce--navbar container-fluid">
                    <nav class="container navbar navbar-light navbar-static-top">
                    <div class="clearfix">
                        <button class="navbar-toggler float-xs-right hidden-sm-up collapsed" type="button" data-toggle="collapse" data-target="#caveats-main-nav"
                        aria-controls="caveats-main-nav" aria-expanded="false" aria-label="Toggle navigation"></button>
                        <a class="navbar-brand hidden-sm-up" href="{{ url ('/') }}">
                        <h3>Caveats</h3>
                        </a>
                    </div>
                    <div class="navbar-toggleable-xs collapse" id="caveats-main-nav" aria-expanded="false" style="">
                        <ul class="nav navbar-nav">
                            <li class="nav-item hidden-xs-down">
                                <a class="nav-item nav-link" href="{{ url ('/') }}">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item hidden-xs-down">
                                <a class="nav-item nav-link" href="{{ url ('/caveats') }}">
                                <h4>Caveats</h4>
                                </a>
                            </li>
                            <li class="nav-item hidden-md-up ">
                                <a class="nav-item nav-link " href="{{ url ('/pricing') }}">Pricing</a>
                            </li>
                            <li class="nav-item hidden-md-up ">
                                <a class="nav-item nav-link " href="{{ url ('/contacts') }}">Contacts</a>
                            </li>
                        </ul>
                        @include('layouts.auth-nav')
                    </div>
                    </nav>
                </div>
        @yield('content')


    <!-- Footer-->
  <div class="ce--footer container-fluid">
    <div class="container hidden-sm-down">
      <ul class="nav navbar-nav">
        <li class="nav-item">
          <a class="nav-item nav-link " href="{{ url ('/caveats') }}">Caveats</a>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link " href="{{ url ('/pricing') }}">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link " href="{{ url ('/contacts') }}">Contacts</a>
        </li>
        <li class="nav-item">
          <span class="nav-item nav-link ">&#124;</span>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link active" href="{{ url ('/faqs/(#payment') }}">Payment Details</a>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link " href="{{ url ('/company') }}">Our Story</a>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link " href="{{ url ('/articles') }}">Articles</a>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link " href="{{ url ('/faqs') }}">FAQs</a>
        </li>
        <li class="nav-item">
          <span class="nav-item nav-link ">&#124;</span>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link " href="{{ url ('/socialmedia/fb') }}">Facebook</a>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link " href="{{ url ('/socialmedia/t') }}">Twitter</a>
        </li>
      </ul>
    </div>
    <div class="container">
      &copy; 2016 Caveats &bull;
      <!--&copy; {{date('Y') === '2016' ? date('Y') : '2016 &mdash; '.date('Y')}} Caveats &bull;-->
    @include('includes/termsNav')
    </div>
  </div>
</body>
<script src="{{ elixir('js/app.js') }}"></script>
<example></example>
</html>
