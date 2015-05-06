@extends('layout')

    

@section('navbar')

@stop

@section('jumbo')

<h1>Post a ride!</h1>

@stop

@section('content')

    @foreach($errors->all() as $errorMessage)
        <p class="alert alert-danger"> {{ $errorMessage }} </p>
    @endforeach

    @if(Session::has('success'))
    <p class="alert alert-success"> {{ Session::get('success') }} </p>
    @endif

@if(Auth::check())

<div class="controls boxed">
    <div class="inner">

<form method="post" action="/rides">
        <input type="hidden" name="_token" value= "{{ (csrf_token()) }}" >
        <input type="hidden" name="user_id" value= "{{ Auth::id() }}" >

<label> Date and Time </label>
        <div class="container">
            <div class="row">
                <div class='col-sm-6'>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='datetime' name="datetime" class="form-control" />
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

        <div class="form-group">
            <label>Number of Spots (besides yourself)</label>
            <select class="form-control" name="spots_avail">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
</div>

@else 
<div class="col-md-6">
<p class="alert alert-danger">Sorry you must be logged in to post a ride!</p>
</div>

@endif
 
@stop