@extends('layout')
@section('headder')

<head>
<?php echo $map['js']; ?>
</head>
@stop

@section('navbar')
                
@stop

@section('jumbo')
<h1> Welcome Home</h1>
<h3> Hello {{{ Auth::user()->name }}} ! </h3>

@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Explore Locations</strong></div>

				<div class="panel-body">

					    <?php echo $map['html']; ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><strong> Upcoming Available Rides</strong></div>
				<div class="panel-body">
			    <table class="table table-striped">
			        <thead>
			            <tr>
			                <th>Destination</th>
			                <th>Meeting Point</th>
			                <th>Date</th>
			                <th>Time</th>
			                <th>Spots Available</th>
			            </tr>
			        </thead>

			        <tbody>
			        @foreach ($ridelist as $ride)

			        <tr>
			            <td> {{ $ride->location_name }} </td>
			            <td> {{ $ride->origin_id }} </td>
			            <td> {{ $ride->datetime }} </td>
			            <td> </td>
			            <td> {{ $ride->spots_avail - $ride->spots_filled }} </td>
			        </tr>
			        @endforeach

			        </tbody>
			    </table>
			</div>
		</div>
	</div>
</div>
@endsection
