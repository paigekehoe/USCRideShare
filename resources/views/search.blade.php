@extends('layout')

@section('navbar')


@stop

@section('jumbo')
<h1>Going somewhere??</h1>
<h3>Search for it here! </h3>

@stop

@section('content')
<div class="col-md-6">
    <div class="container-fluid">
    <div class="row">
    <form action="/rides/results" method="get">
        <div class="form-group">
            <label>Where would you like to go?</label>
            <select class="form-control" name="dest">
                <option value ="-1">
                    Anywhere!
                </option>
              @foreach ($locations as $loc)
                    <option value = "{{ $loc->id }}" >
                        {{ $loc->location_name }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="container">

            <div class="row">
                <label> When would you like to go? </label>
                    <div class="form-group">
                        <div class='input-group date' id='date'>
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
        <input type="submit" value="Search">
        </div>


    </form>

    </div>
</div>


@stop