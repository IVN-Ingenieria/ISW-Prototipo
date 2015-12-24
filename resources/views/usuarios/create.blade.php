@extends('layouts.base')
@section('content')
    {!! Form::open(['url' => 'usuarios','class'=>'form-horizontal']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre',['class'=>'control-label']) !!}
        {!! Form::text('nombre', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email',['class'=>'control-label']) !!}
        {!! Form::text('email', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
    </div>


    {!! Form::close() !!}
@stop
