@extends('layout')
 
@section('content')
<div class="col-sm-8">
<div class="widget-container widget_login style boxed">
   
        
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{!!$error!!}</p>
        @endforeach
        <div class="inner">
        <h3>Login</h3>
        {!!Form::open(['url'=>'/login','class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
        <div class="form-group">
            {!! Form::label('name','Username:',['class'=>'label_title']) !!}
            <div class="field_text">
                {!! Form::text('name',Input::old('name'),['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
        {!! Form::label('password','Password:',['class'=>'label_title']) !!}

            <div class="field_text">
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="text-center">
            {!!Form::submit('Login',['class'=>'btn btn-default'])!!}
        </div>
        {!!Form::close()!!}
    </div>
</div>
</div>
 </div>
@stop
