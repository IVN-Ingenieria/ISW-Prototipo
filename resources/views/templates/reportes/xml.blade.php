@extends('layouts.base')

@section('title', 'Reportes - Planillas XML')

@section('content')

    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <h2>Informes de pago a instituciones de salud</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="space-30"></div>
                <table class="box table">
                    <thead>
                    <tr>
                        <th>Institución</th>
                        <th>Empleados vinculados</th>
                        <th>Monto adeudado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($isapres as $isapre => $data)
                        <tr>
                            <td>{{$isapre}}</td>
                            <td>{{$data['count']}}</td>
                            <td>{!! Common::getFormattedAmount($data['amount'])!!}</td>
                        </tr>
                    @endforeach
                    <tr class="info">
                        <td><b>TOTAL</b></td>
                        <td><b>{{$meta['count']}}</b></td>
                        <td><b>{!! Common::getFormattedAmount($meta['total'])!!}</b></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="space-15"></div>
                <a href="#" role="button" class="btn btn-default pull-right">
                    <i class="fa fa-list"></i> Generar XML
                </a>
                <a href="{{ URL::to('report/list') }}" role="button" class="btn btn-primary pull-right">
                    <i class="fa fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>

    </div>

@endsection
