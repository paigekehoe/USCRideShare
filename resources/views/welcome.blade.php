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
			   			<h3> Hello, {{ Auth::user()->name }}!</h3>
<div class="col-md-8">
		<div class="controls boxed line-top">
			<div class="inner clearfix">
				<h2> Hey Admin! What would you like to do? </h2>
				<div class="btn btn-default"> 
					<a href="/newlocation">Create a New Location</a>
				</div>
			</div>
		</div>
</div>

@endif


<!-- <div class="col-sm-7">
<div class="widget-container boxed">
    <h3 class="widget-title">My Rides</h3>
    	<div class="inner">
    		I'm driving
    		I'm riding along
    	</div>
    </div>

</div> -->


@unless (Auth::check())

	YOU SNEAKY MOM! You're not signed in

@endunless

@stop