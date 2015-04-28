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

<label>Date and Time </label>
<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
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

<form method="post" action="/rides">
        <input type="hidden" name="_token" value= "{{ (csrf_token()) }}" >
        <div class="form-group">
            <label>Destination</label>
            <input name="destination" class="form-control">
        </div>

        <div class="form-group">
            <label>Meeting Point</label>
            <input name="meetingPoint" class="form-control">
        </div>
  
         <!-- THIS IS WHERE WE WILL INPUT A MAP TO CREATE THAT BABE -->
        <div class="form-group">
            <label>Starting Point</label>
            <select class="form-control" name="origin_id">
                @foreach ($locations as $loc)
                    <option value = "{{ $label->id }}" >
                        {{$loc->loc_name }}
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


 
@stop