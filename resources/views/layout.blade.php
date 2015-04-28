
<head>

<script src="/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
  <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    

  <script src="/bower_components/moment/min/moment.min.js"></script>

  <script src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />

</head>

    <body>

    @yield('navbar')
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header ">
                <ul class="nav navbar-nav">
                    <li><a class="active" href="#"><strong>USC Ride Share </strong></a></li>
                    <li><a href="/rides">Home</a></li>
                    <li><a href="/rides/search">Find Rides</a></li>
                    <li><a href="/rides/create">Post Ride</a></li>
                </ul>
              </div>
              
        <ul class="nav navbar-nav navbar-right">
          @if (Auth::guest())
            <li><a href="/auth/login">Login</a></li>
            <li><a href="/auth/register">Register</a></li>
          @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/auth/logout">Logout</a></li>
              </ul>
            </li>
          @endif
        </ul>
            </div>
        </div>
    </nav>

        <div class="jumbotron">
            <div class="header section-padding">
        <div class="background">&nbsp;</div>
            @yield('jumbo')
        </div>
    </div>

         @yield('sidebar')
         <div id="wrapper">
            <div id="sidebar-wrapper">
                <ul class ="nav nav-stacked fixed" id="sidebar">
                 <ul class="nav nav-stacked" style='position:fixed;'>

                 </ul>
             </ul>
            </div>
        </div>
        @show

            <div class="container">
                  @yield('content')
            </div>
        

    </body>
 

