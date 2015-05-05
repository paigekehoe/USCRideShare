@extends('layout')

@section('headder')

@stop

@section('navbar')
@stop
@foreach($errors->all() as $error)
            <p class="alert alert-danger">{!!$error!!}</p>
@endforeach

@if(Session::has('success'))
    <p> <h4> {{ Session::get('success') }} </h4></p>
@endif


<h1>Hello, {{ Auth::user()->name }}!</h1>
@stop

@section('content')

@if(Auth::user()->name=='david')

Hey Admin :) What would you like to do?

<a href="newLocation">Create a New Location</a>

@endif

<div class="col-md-10">
    <div class="tabs_framed styled" >
    <ul class="tabs clearfix tab_id2 bookmarks2 active_bookmark1">
    <li class="first active">
    	<a href="#about" data-toggle="tab" hidefocus="true" style="outline:none;">About<a>
    </li>
    <li class="last">
    	<a href="#myrides" data-toggle="tab" hidefocus="true" style="outline:none;">My Rides<a>
    	</li>
    </ul>
   <div class="tab-content boxed clearfix">
   <div class="tab-pane fade active in" id="about">
   	<div class="inner clearfix">
   		<div class="tab-text">
   			<h3> Hello, {{ Auth::user()->name }}!</h3>
			<p> Welcome to USC Ride Share! Here you can find rides going places you want to go from USC.
			Sound awesome? We thought so too.  Finding a ride is simple: </p>
			</br>

			<h3> Find Rides: </h3> <p> Navigate to the "Find Rides" page and select the date or location or both.  A list of
			rides matching your search criteria will show up.</p>

			</br>

			<h3> Post Rides: </h3> <p> Navigate  to the "Post Rides" page and input the time and place you are going, along with how many other spots you have in your car.
			</p>
		</div>
		<div class="bottom clearfix">
		</div>
	</div>
</div>

	<div class="tab-pane fade" id="myrides">
		<div class="inner clearfix">
			<div class="tab_image pull-right">
				rides
			</div>
		</div>
	</div>
</div>


</div>
</div>



@unless (Auth::check())

	YOU SNEAKY MOM! You're not signed in

@endunless

@stop