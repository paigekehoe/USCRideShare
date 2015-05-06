
<head>
@yield('headder')
<script src="/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    

  <script src="/bower_components/moment/min/moment.min.js"></script>

  <script src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

  <link rel="stylesheet" href="/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
 <link rel="stylesheet" href="{{ URL::asset('metro-vibes-css/style.css') }}" />
</head>

    <body>


    @yield('navbar')
      <div class="container-fluid">

    <div class="row" style="padding=50px">
      <div class="col-md-6 ">
        <h1><strong>USC Ride Share</strong></h1>
    </div>
    </div>
  </div>

    <nav class="menu">
        <div class="container-fluid">
            <div class="navbar-header ">
                <ul class="dropdown clearfix boxed">
                    <li><a href="/rides">Home</a></li>
                    <li><a href="/rides/search">Find Rides</a></li>
                    <li><a href="/rides/create">Post Ride</a></li>
                    <li>
                      <a href="#">
                          <i class="icon-menu icon-menu3"></i>
                          <span>account</span>
                      </a>
                      <ul>
                          @if (Auth::guest())
                      <li><a href="/auth/login">Login</a></li>
                      <li><a href="/auth/register">Register</a></li>
                    @else
                        <li><a href="/home">
                          {{ Auth::user()->name }} </a></li>
                          <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                      </li>
                    @endif
                   </ul>
              </div>
            </div>
         </nav>

            <div class="container">
                  @yield('content')
            </div>

    </body>
 

