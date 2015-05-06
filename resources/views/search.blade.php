@extends('layout')

@section('navbar')


@stop

@section('jumbo')
<h1>Going somewhere??</h1>
<h3>Search for it here! </h3>

@stop

@section('content')
<div class="controls boxed">

<div class="inner">

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
                <label> When would you like to go? </label>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' name="datetime" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#datetimepicker1').datetimepicker();
                    });
                </script>
            </div>
        <input type="submit" value="Search">
    </form>
</div>
            </div>
    </div>
</div>


@stop