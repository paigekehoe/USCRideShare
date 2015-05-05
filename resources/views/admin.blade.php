@extends('layout')

@section('headder')

@stop

@section('navbar')
@stop

@section('jumbo')

<h1>Admin Dashboard</h1>
lets do some damage :)

<!-- THIS IS THE PAGE WHERE WE SHOULD BE ABLE
to add locations or remove them - but only as an Admin (david) -->
@stop

@section('content')

    @foreach($errors->all() as $errorMessage)
        <p><h5>  {{ $errorMessage }}  </h5> </p>
    @endforeach

    @if(Session::has('success'))
    <p> <h4> {{ Session::get('success') }} </h4></p>
    @endif

@if(Auth::check() || Auth::user()->name=='david')

Hey Admin :) What would you like to do?

<a href="newLocation">Create a New Location</a>
@else

Sorry you are not an admin.  Good try though :)

@endif

 
@stop