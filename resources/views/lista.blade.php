@extends('layouts.base')

@section('content')

    <br>
    <div class = "panel panel-default">
        <div class = "panel-heading" >Lista de trabajadores</div>
        <table class = "table table-responsive table-bordered">
            <thead>
            <tr>
                <th> Id </th>
                <th> Nombre </th>
                <th> Apellido Paterno </th>
                <th> Apellido Materno </th>
                <th> Ver Detalle</th>

            </tr>
            </thead>

            <tbody>
            @foreach($datos as $datos)
                <tr>
                    <td> {{ $datos->id }} </td>
                    <td> {{ $datos->nombre }} </td>
                    <td> {{ $datos->apellido_p }} </td>
                    <td> {{ $datos->apellido_m }} </td>
                    <td>
                        <a href ="{!! URL::to('lista/ver/'.$datos->id) !!}" class = "btn btn-success btn-xs">Ver</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
