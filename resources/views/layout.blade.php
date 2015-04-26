
<html>
<head>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
  <script type="text/javascript" src="/bower_components/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="/bower_components/moment/min/moment.min.js"></script>
  <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
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

        <script type="text/javascript">
            ('.dropdown-toggle').dropdown()

        </script>

        

    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    </html>
