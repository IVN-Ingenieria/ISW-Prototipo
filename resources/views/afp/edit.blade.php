@extends('layouts.base')
@section('content')

<h1>Editar la AFP: {{$afp->nombre}}</h1>

{!! Form::model($afp, ['method' => 'PATCH', 'action' => ['AfpController@update' , $afp->id ] ]) !!}

    <div class = "form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group">
        {!! Form::label('rut', 'Rut') !!}
        {!! Form::text('rut', null, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group">
        {!! Form::label('fono', 'Fono') !!}
        {!! Form::text('fono', null, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group">
        {!! Form::label('comision', 'Comision') !!}
        {!! Form::text('comision', null, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group">
        {!! Form::label('sitio', 'Sitio Web') !!}
        {!! Form::text('sitio', null, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group">
    {!! Form::submit('Modificar Datos', ['class' => 'btn btn-primary form-control'])!!}
    </div>

{!! Form::close() !!}

{!! Form::open(['method' => 'DELETE', 'route' => ['afp.destroy', $afp->id]]) !!}

<div class = "form-group">
    {!! Form::submit('Eliminar Datos', ['class' => 'btn btn-danger form-control'])!!}
    </div>

{!! Form::close() !!}


@if($errors->any())
    <div class = "alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
    </ul>
    </div>
    @endif

@stop