@extends('layouts.base')

@section('title', 'Reportes - Lista de empleados')

@section('content')
    <div class="container">
        <div class="row">
            <div class="space-15 col-sm-12"></div>
            <div class="col-sm-12">
                <h2>Generar informes de remuneraciones</h2>
            </div>
            <div class="space-30 col-sm-12"></div>
        </div>
        <div class="row box">
            <div class="col-sm-12">
                <table class="table table-hover" style="max-width: 600px;">
                    <thead>
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Informe</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $user)
                    <tr>
                        <td>{{$user->rut}}</td>
                        <td>{{$user->name}}</td>
                        <td><a href="{{ URL::to('reportes/'.$user->id) }}" class="btn btn-success" role="button">Generar</a> </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="space-30 col-sm-12"></div>
        </div>
    </div>
@endsection