@extends('layout')

@section('navbar')           
@stop
@section('content')
<h1> {{ $loc->location_name }}</h1>

<div class="col-md-6">
<div class="controls boxed line-top">
			<div class="inner clearfix">
				<h2> Weather today is ... 
	</div>
	<div class="widget-container widget-weather boxed clearfix">
	    <div class="air-temp"><strong>{{ round($temperature) }}°</strong></div>
	    <div class="water-temp"><strong>{{ $percip }}%</strong></div>
	    <div class="wind-speed"><strong>{{ $wind }}</strong></div>
	</div>
</div>
</div>
<div class="col-md-6">
    <div class="widget-container boxed">
    <h3 class="widget-title">Rides going here</h3>
   		 <div class="inner">
		    <table class="table table-hover">
		        <thead> 
		            <tr>
		                <th>Date & Time</th>
		                <th>Spots Available</th>
		            </tr>
		        </thead>

		        <tbody>
		        @foreach ($ridelist as $ride)

		        <tr class='clickable-row' data-href="/rides/<?php echo $ride->id ?>">
		                     <td> {{ $ride->datetime }} </td>
		            <td> {{ $ride->spots_avail - $ride->spots_filled }} </td>
		        </tr>
		        @endforeach

		        </tbody>
		    </table>
		</div>
	</div>
</div>

@stop