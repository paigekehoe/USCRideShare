@extends('layout')

@section('headder')

<head>
<?php echo $map['js']; ?>
</head>

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
            <label>Select Location </label>
            <!-- <input type="text" id="myPlaceTextBox" /> -->


 

<?php echo $map['html']; ?>

</div>
         <!-- THIS IS WHERE WE WILL INPUT A MAP TO CREATE THAT BABE -->


        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@else

Sorry you are not an admin.  Good try though :)

@endif

 
@stop