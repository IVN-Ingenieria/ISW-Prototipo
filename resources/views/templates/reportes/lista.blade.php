@extends('layouts.base')

@section('title', 'Reportes - Lista de empleados')

@section('content')
    <div class="container">
        <div class="row">
            <div class="space-15 col-sm-12"></div>
            <div class="col-sm-12">
                <h2>Operaciones para gestión de pagos</h2>
            </div>
            <div class="space-30 col-sm-12"></div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="input-group"> <span class="input-group-addon">Filtrar lista</span>
                    <input id="filter" type="text" class="form-control" placeholder="Escriba aquí...">
                </div>
            </div>
            <div class="col-sm-6">
                <div style="float: right">
                    <a href="{{ URL::to('report/xml') }}" class="btn btn-info" role="button"><i class="fa fa-list"></i> Planillas de pago a Isapre</a>
                    <a href="#" class="btn btn-primary" role="button"><span class="fa fa-download fa-lg"></span> Descargar todos</a>
                </div>
            </div>
            <div class="col-sm-12"><div class="space-30 col-sm-12"></div></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover box">
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
                    <tbody class="searchable">
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
                    <a href="{{ URL::to('report/xml') }}" class="btn btn-info" role="button"><i class="fa fa-list"></i> Planillas de pago a Isapre</a>
                    <a href="#" class="btn btn-primary" role="button"><span class="fa fa-download fa-lg"></span> Descargar todos</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {

            (function ($) {

                $('#filter').keyup(function () {

                    var rex = new RegExp($(this).val(), 'i');
                    $('.searchable tr').hide();
                    $('.searchable tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();

                })

            }(jQuery));

        });
    </script>
@endsection