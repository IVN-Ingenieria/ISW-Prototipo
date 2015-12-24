@extends('layouts.base')
@section('content')

    <h1>Formulario registro trabajador</h1>


    {!! Form::open(['url' => 'lista']) !!}

    <div class="form-group">
        {!! Form::label('nombre', 'Nombre',['class'=>'control-label']) !!}
        {!! Form::text('nombre', null,['class'=>'form-control']) !!}
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
        {!! Form::label('rut', 'Rut',['class'=>'control-label']) !!}
        {!! Form::text('rut', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email',['class'=>'control-label']) !!}
        {!! Form::text('email', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('direccion', 'Direccion',['class'=>'control-label']) !!}
        {!! Form::text('direccion', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefono', 'Telefono/Celular',['class'=>'control-label']) !!}
        {!! Form::text('telefono', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cargo', 'Cargo',['class'=>'control-label']) !!}
        {!! Form::text('cargo', null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Guardar',['class'=>'btn btn-primary form-control']) !!}
    </div>



    {!! Form::close() !!}

    @if($errors -> any())
        <ul class = "alert alert-damage">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

@stop