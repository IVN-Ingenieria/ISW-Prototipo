@extends('layouts.base')
    @section('content')
        <ol class="breadcrumb">
            <li class="active">Usuarios</li>
        </ol>
        <table class="table table-bordered">
            <th>Nombre</th>
            <th>Correo</th>
            <th>Creado</th>
            <th>Acciones</th>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->created_at }}</td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="{!! URL::to('usuarios/'.$usuario->id) !!}">Ver</a>
                            <a class="btn btn-xs btn-success" href="{!! URL::to('usuarios/'.$usuario->id.'/edit') !!}">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
        <!-- Paginacion -->
       <div class="text-center"> </div>
    @endsection



