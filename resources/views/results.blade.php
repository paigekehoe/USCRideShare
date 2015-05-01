@extends('layout')

@section('navbar')
                
@stop

@section('jumbo')
<h1> Search Results</h1>
<h3> You searched for {{ $day }} and {{ $location }} </h3>
@stop

@section('content')



<div class = "results">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Destination</th>
                <th>Date</th>
                <th>Time</th>
                <th>Spots Available</th>
                <th>Meeting Point</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($rides as $ride) : ?>
        <tr>
            <td><?php echo $ride->location_name?> </td>
            <td><?php echo $ride->date ?></td>
            <td><?php echo $ride->time ?></td>
            <td><?php echo $ride->spots_avail - $ride->spots_filled?></td>
            <td><?php echo $ride->origin_id ?></td>

<!-- <td><?php echo DATE_FORMAT(new DateTime($ride->date), 'm-d-Y') ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($ride->time), 'h:m') ?></td>
 -->
        </tr>
        <?php endforeach ?>

        </tbody>
    </table>


</div>



@stop