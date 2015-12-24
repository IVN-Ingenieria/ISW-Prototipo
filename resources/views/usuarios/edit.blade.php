@extends('layouts.base')
    @section('content')
        <ol class="breadcrumb">
            <li><a href="{!! URL::to('usuarios') !!}">Usuarios</a></li>
            <li><a href="{!! URL::to('usuarios/'. $usuario->id) !!}">{!! $usuario->name !!}</a></li>
            <li class="active">Editando</li>
        </ol>

        {!! Form::model($usuario,['route'=>['usuarios.update',$usuario],'method'=> 'PUT','class' =>'form-horizontal']) !!}

           <div class="form-group">
               {!! Form::label('name', 'Nombre', ['class'=>'control-label']) !!}
               {!! Form::text('name', null, ['class'=>'form-control']) !!}
           </div>

            <div class="form-group">
                {!! Form::label('email', 'Email', ['class'=>'control-label']) !!}
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
            </div>

        {!! Form::close() !!}
    @stop
