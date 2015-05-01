@extends('layout')

    

@section('navbar')

@stop

@section('jumbo')

<h1>Admin Dashboard</h1>
lets do some damage

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


<form method="post" action="/locations">
        <input type="hidden" name="_token" value= "{{ (csrf_token()) }}" >

        <div class="container">
            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
            <label>Name</label>
            <input name="name" class="form-control">
        </div>

        <div class="form-group">
            <label>Meeting Point</label>
            <input name="meetingPoint" class="form-control">
        </div>
  
         <!-- THIS IS WHERE WE WILL INPUT A MAP TO CREATE THAT BABE -->


        <div class="form-group">
            <label>Number of Spots</label>
            <input name="spots_avail" class="form-control">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>


 
@stop