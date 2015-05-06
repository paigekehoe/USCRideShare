@extends('layout')

@section('navbar')
                
@stop

@section('jumbo')
@if ($location == "-1")
<?php $location = "any place" ?>
@endif

<h2><strong> Search Results <strong></h2>
<h3> You searched for {{{ $datetime or 'any day' }}} and {{{ $location }}} </h3>
@stop

@section('content')
<div class="well well-large">
<div class = "results">
    <table class="table table-striped">
        <thead>
         <tr>
                <th>Destination</th>
                <th>Date</th>
                <th>Time</th>
                <th>Spots Available</th>
            </tr>
        </thead>

        <tbody>
             @foreach ($ridelist as $ride)

        <tr>
            <td> {{ $ride->location_name }} </td>
            <td> {{ $ride->datetime }} </td>
            <td> </td>
            <td> {{ $ride->spots_avail - $ride->spots_filled }} </td>
        </tr>
        @endforeach

        </tbody>
    </table>

</div>
</div>



@stop