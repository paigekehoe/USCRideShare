@extends('layout')

@section('navbar')           
@stop

@section('jumbo')
<h1> Ride Detail View </h1>
@stop

@section('contents')
{{{ var_dump($ride) }}} 
@stop
