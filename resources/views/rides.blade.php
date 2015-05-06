@extends('layout')

@section('headder')

<head>

<?php echo $map['js']; ?>

</head>
@stop
@if(Auth::check())
<?php $name = Auth::user()->name ?>
@else
<?php $name = "new friend" ?>
@endif

@section('content')

<div class="col-xs-4">
       <div class="tab-content boxed clearfix"
                    <div class="tab-text">
                        <h3> Hello, {{ $name }}!</h3>
                        <p> Welcome to USC Ride Share! Here you can find rides going places you want to go from USC.
                        Sound awesome? We thought so too.  Finding a ride is simple: </p>
                        <h4> Find Rides: </h4> <p> Navigate to the "Find Rides" page and select the date or location or both.  A list of
                        rides matching your search criteria will show up.</p>
                        <h4> Post Rides: </h4> <p> Navigate  to the "Post Rides" page and input the time and place you are going, along with how many other spots you have in your car.
                        </p>
                    </div>
                </div>
<div class="col-md-4">
    <div class="widget-container boxed">
    <h3 class="widget-title">Location Map</h3>
    <div class="inner">

    <?php echo $map['html']; ?>
</div>
</div>
</div>

<div class = "col-md-4">
    <div class="widget-container boxed">
    <h3 class="widget-title">Available Rides</h3>
    <div class="inner">
    <table class="table table-hover">
        <thead> 
            <tr>
                <th>Destination</th>
                <th>Date & Time</th>
                <th>Spots Available</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($ridelist as $ride)

        <tr class='clickable-row' data-href="/locations/<?php echo $ride->destination_id ?>">
            <td>  <a href="/locations/<?php echo $ride->destination_id ?>"> {{ $ride->location_name }} </td>
            <td> {{ $ride->datetime }} </td>
            <td> {{ $ride->spots_avail - $ride->spots_filled }} </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
</div>
</div>
<div>



</div>

<script 
<script type="text/javascript">
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
</script>

@stop