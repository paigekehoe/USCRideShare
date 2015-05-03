@extends('layout')
@section('headder')

<head>
<?php echo $map['js']; ?>
</head>
@stop

@section('navbar')
                
@stop

@section('jumbo')
<h1> Available Rides</h1>

@stop

@section('content')

<div class="col-md-6">

    <?php echo $map['html']; ?>
</div>

<div class = "col-md-6">
    <table class="table table-hover">
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

        <tr class='clickable-row' data-href="/rides/<?php echo $ride->id ?>">
            <td>  <a href="/loc/ations<?php echo $ride->destination_id ?>"> {{ $ride->location_name }} </td>
            <td>{{ $ride->origin_id }} </td>
            <td> {{ $ride->datetime }} </td>
            <td> </td>
            <td> {{ $ride->spots_avail - $ride->spots_filled }} </td>
        </tr>
        @endforeach

        </tbody>
    </table>

</div>
<div>



</div>

<script 
<script type="text/javascript">
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
</script>

@stop