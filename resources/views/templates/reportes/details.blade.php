@extends('layouts.base')

@section('title', 'Reportes - Detalles de reporte')

@section('content')

    {!! Html::style('assets/generator/liquidacion.css') !!}
    <div class="container">
        <div class="row">
            @include('templates.reportes.report')
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="space-15"></div>
                <a href="{{ URL::to('report/generate/'.$id) }}" role="button" class="btn btn-default pull-right">
                    <i class="fa fa-file-pdf-o"></i> Descargar PDF
                </a>
                <a href="{{ URL::to('report/list') }}" role="button" class="btn btn-primary pull-right">
                    <i class="fa fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>

@endsection