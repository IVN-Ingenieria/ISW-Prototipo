@extends('layouts.base')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{!! URL::to('usuarios') !!}">Usuarios</a></li>
        <li class="active">{!! $usuario->name !!}</li>
    </ol>

    <div class="well span6">
        <div class="row-fluid">
            <div class="span2" >
                <img src="" width="100" alt="avatar" class="img-thumbnail">
            </div> <!-- /span2 -->

            <div class="span8">
                <h3>Usuario: {!! $usuario->name !!}</h3>
                <h6>Email: {!! $usuario->email !!}</h6>
            </div> <!-- /span8 -->

            <div class="span2">
                <div class="btn-group">
                    <a class="btn dropdown-toggle btn-primary" data-toggle="dropdown" href="#">
                        Acción
                        <span class="icon-cog icon-white"></span><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{!! URL::to('usuarios/'.$usuario->id.'/edit')!!}"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></li>
                    </ul>
                </div> <!-- /btn-group -->
            </div> <!-- /span2 -->
        </div> <!-- /row-fluid -->
    </div> <!-- /well span6 -->
@stop('content')
