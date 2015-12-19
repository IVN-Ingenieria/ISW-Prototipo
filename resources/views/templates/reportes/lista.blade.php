@extends('layouts.base')

@section('title', 'Reportes - Lista de empleados')

@section('content')
    <div class="container">
        <div class="row">
            <div class="space-15 col-sm-12"></div>
            <div class="col-sm-12">
                <h2>Operaciones de usuario</h2>
            </div>
            <div class="space-30 col-sm-12"></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div style="float: right">
                    <a href="#" class="btn btn-primary" role="button">Descargar todos los PDF</a>
                    <a href="#" class="btn btn-info" role="button">Generar XML</a>
                    <a href="#" class="btn btn-info disabled" role="button">Enviar XML</a>
                </div>
                <div class="space-15 col-sm-12"></div>
            </div>
        </div>
        <div class="row box">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Familia</th>
                        <th>Contrato</th>
                        <th>AFP</th>
                        <th>Isapre</th>
                        <th>Informe</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($workers as $worker)
                    <tr>
                        <td>{!! Common::getFormattedRut($worker->rut) !!}</td>
                        <td>{{$worker->name}}</td>
                        <td>{{$worker->family}} cargas<br><a href="#">[modificar]</a></td>
                        <td>{!! Common::getFormattedAmount($worker->salary) !!}<br><a href="#">[modificar]</a></td>
                        <td>{{$worker->afp}}<br><a href="#">[modificar]</a></td>
                        <td>{{$worker->isapre}}<br><a href="#">[modificar]</a></td>
                        <td>
                            <a href="{{ URL::to('report/show/'.$worker->id) }}" class="btn btn-default btn-sm" role="button">
                                <span class="fa fa-search fa-lg"></span> Revisar
                            </a>
                            <a href="{{ URL::to('report/generate/'.$worker->id) }}" class="btn btn-primary btn-sm" role="button">
                                <span class="fa fa-download fa-lg"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="space-15 col-sm-12"></div>
        </div>
        <div class="row">
            <div class="space-15 col-sm-12"></div>
            <div class="col-sm-12">
                <div style="float: right">
                    <a href="#" class="btn btn-primary" role="button">Descargar todos los PDF</a>
                    <a href="#" class="btn btn-info" role="button">Generar XML</a>
                    <a href="#" class="btn btn-info disabled" role="button">Enviar XML</a>
                </div>
            </div>
        </div>
    </div>
@endsection