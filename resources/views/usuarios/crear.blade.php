

@extends('layouts.base')
@section('content')
    <h1>crear usuario</h1>
    {!! Form::open(['url'=>'usuarios'] ) !!}
    <div class= 'form-group'>
        {!! form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre',null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('apellido_p', 'Apellido Paterno',['class'=>'control-label']) !!}
        {!! Form::text('apellido_p', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('apellido_m', 'Apellido Materno',['class'=>'control-label']) !!}
        {!! Form::text('apellido_m', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email',['class'=>'control-label']) !!}
        {!! Form::text('email', null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('crear usuario',['class'=>'btn btn-primary form-control']) !!}

    </div>


    {!! Form::close() !!}
@stop
