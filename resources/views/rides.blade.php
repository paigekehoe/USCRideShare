@extends('layout')

@section('navbar')
                
@stop

@section('jumbo')
<h1> Available Rides</h1>

@stop

@section('content')


<p>
    Here are a list of upcoming rides

</p>

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
        <?php foreach ($ridelist as $ride) : ?>
        <tr>
            <td> {{ $ride->destination_id }} </td>
            <td><?php echo DATE_FORMAT(new DateTime($ride->datetime), 'm-d-Y') ?></td>
            <td><?php echo DATE_FORMAT(new DateTime($ride->datetime), 'h:m')?></td>
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