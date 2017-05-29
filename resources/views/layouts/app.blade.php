<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hakikisha Ltd.</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{elixir('css/app.css')}}" rel="stylesheet">
    <link href="{{url('css/flat/zebra_dialog.css')}}" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/css/jquery.dataTables.css" />
      
         

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
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
                        <h3>Dashboard</h3>
                        </a>
                    </div>
                    <div class="navbar-toggleable-xs collapse" id="caveats-main-nav" aria-expanded="false" style="">
                        <ul class="nav navbar-nav">
                        <li class="nav-item hidden-xs-down">
                            <a class="nav-item nav-link active" href="{{ url ('/') }}">
                            <h4>Home</h4>
                            </a>
                        </li>
                         @if (Auth::guest())
                         @else
                          <li class="nav-item hidden-xs-down">
                            <a class="nav-item nav-link active" href="{{ url ('/home') }}">
                            <h4>Dashboard</h4>
                            </a>
                        </li>
                         @endif
                       
                           @if(Session::get('confirmed')=='0')
                           <li class="nav-item hidden-xs-down">
                               <div class="alert alert-warning" style="margin-left:100px;"><i class="fa fa-warning"></i> You have not verified your account. Please Check your email! <!--a href="{{url('verify').'/'.Session::get('token')}}" class="btn btn-primary btn-sm">Verify</a--></div>
                            </a>
                        </li>
                        @else
                        
                        @endif
                        
                        @if(!empty($message))
                         <div class="alert alert-info" style="margin-left:100px;"><i class="fa fa-info"></i> Account verification is successful!</div>
                        @endif
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

                <!-- Header/Hero content-->
                <div class="container">
                    <div class="jumbotron jumbotron--home">
                    <div class="container jumbotron--title">
                        <span class="lead">Property owners&hellip;</span>
                        <span class="hero--title"><span class="ce--text-underline">Protect</span> your property with a caveat&hellip;</span>
                    </div>
                    <div class="container jumbotron--title hidden-sm-down">
                        <span class="lead">Buyers&hellip;</span>
                        <span class="hero--title"><span class="ce--text-underline">Hakikisha</span> the property you are buying has no caveat&hellip;</span>
                    </div>
                    </div>
    <div class="row">
        <form class="form_horizontal ce--searchbar form-inline" role="form" accept-charset="UTF-8" action="{{url('/search')}}" method="GET">


                    <input class="ce--searchbar-input form-control" type="text" id='keyword' name='keyword'>
                    <button class="ce--searchbar-button btn btn-success" type="submit">Search</button>
                    </form>
                    <div class="ce--searchbar-help text-muted text-xs-center">Search by LR no. or Caveat Reference Numbers&hellip;</div>
                </div>
                </div>

        @yield('content')


    <!-- Footer-->
  <div class="ce--footer container-fluid">
    <div class="container hidden-sm-down">
      <ul class="nav navbar-nav">
        
        <li class="nav-item">
          <a class="nav-item nav-link " href="{{ url ('/sureplans') }}">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link " href="{{ url ('/contacts') }}">Contacts</a>
        </li>
        <li class="nav-item">
          <span class="nav-item nav-link ">&#124;</span>
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
        <!--li class="nav-item">
          <span class="nav-item nav-link ">&#124;</span>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link " target="_blank" href="http://facebook.com/SureKE">Facebook</a>
        </li>
        <li class="nav-item">
          <a class="nav-item nav-link " target="_blank" href="http://twitter.com/SureKE">Twitter</a>
        </li-->
      </ul>
    </div>
    <div class="container">
      &copy; 2016 Caveats &bull;
      <!--&copy; {{date('Y') === '2016' ? date('Y') : '2016 &mdash; '.date('Y')}} Caveats &bull;-->
      @include('includes/termsNav')
    </div>
  </div>
</body>

<!-- Script in body, to avoid Vue cant find elem warning-->
<script src="{{ elixir('js/app.js') }}"></script>
    <script src="{{url('js/zebra_dialog.js')}}"></script>
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
          <script type="text/javascript" src="{{url('js/inputmask.js')}}"></script>
          <script type="text/javascript" src="{{url('js/jquery.simplewizard.min.js')}}"></script>
         

            <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/jquery.dataTables.min.js"></script>
<!-- Scripts -->

</html>
