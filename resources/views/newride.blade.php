@extends('layout')

    

@section('navbar')

@stop

@section('jumbo')

<h1>Post a ride!</h1>

@stop

@section('content')

    @foreach($errors->all() as $errorMessage)
        <p><h5>  {{ $errorMessage }}  </h5> </p>
    @endforeach

    @if(Session::has('success'))
    <p> <h4> {{ Session::get('success') }} </h4></p>
    @endif

@if(Auth::check())

<form method="post" action="/rides">
        <input type="hidden" name="_token" value= "{{ (csrf_token()) }}" >
        <input type="hidden" name="user_id" value= "{{ Auth::id() }}" >

<label> Date and Time </label>
        <div class="container">
            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' name="datetime" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#datetimepicker1').datetimepicker();
                    });
                </script>
            </div>
        </div>

        <div class="form-group">
            <label> Destination </label>
            <select class="form-control" name="destination_id">
                @foreach ($locations as $loc)
                    <option value = "{{ $loc->id }}" >
                        {{ $loc->location_name }}
                    </option>
                @endforeach
            </select>
        </div>
  
         <!-- THIS IS WHERE WE WILL INPUT A MAP TO CREATE THAT BABE -->
        <div class="form-group">
            <label> Starting Point </label>
            <select class="form-control" name="origin_id">
                @foreach ($locations as $loc)
                    <option value = "{{ $loc->id }}" >
                        {{ $loc->location_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Number of Spots</label>
            <input name="spots_avail" class="form-control">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

@else 
<div class="col-md-6">
<p class="alert alert-danger">Sorry you must be logged in to post a ride!</p>
</div>

@endif
 
@stop