@extends('layouts.base')

@section('content')

<div class="space-30"></div>
<div class="space-30"></div>
<div class = "panel panel-default">
    <div class = "panel-heading" >Lista de AFP</div>
        <table class = "table table-responsive table-bordered">
            <thead>
                <tr>
                    <th> Id </th>
                    <th> Nombre </th>
                    <th> Acciones </th>
                </tr>
            </thead>

            <tbody>
                @foreach($afps as $afp)
                    <tr>
                        <td> {{ $afp->id }} </td>
                        <td> {{ $afp->name }} </td>
                        <td>
                        <a href ="afp/{{$afp->id}}/edit" class = "btn btn-warning btn-xs">Editar</a>
                        <a href ="afp/{{$afp->id}}" class = "btn btn-success btn-xs">Mostrar Detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>

@endsection