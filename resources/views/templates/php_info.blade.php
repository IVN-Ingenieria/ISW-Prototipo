@extends('layouts.base')

@section('title', 'PHP Info')

@section('content')
    <div class="row">

        <ol class="breadcrumb">
            <li class="active">Prototipo</li>
        </ol>

        <div class="col-sm-12">
            <h2>Información de PHP</h2>
            <div class="space-15"></div>
        </div>

        <div class="col-sm-8">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Módulo</th>
                    <th>Requerido</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tests as $key => $test)
                    <tr class="{{ $test->status ? 'success text-success' : 'danger text-danger' }}">
                        <td>{{$test->label}}</td>
                        <td>{{$test->required}}</td>
                        <td><strong>{{$test->message}}</strong></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-sm-12">
            <h2>Información de la base de datos</h2>
            <div class="space-15"></div>
        </div>

        <div class="col-sm-8">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Criterio</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                @foreach($db_tests as $key => $test)
                    <tr class="{{ $test->status ? 'success text-success' : 'danger text-danger' }}">
                        <td>{{$test->label}}</td>
                        <td><strong>{{$test->message}}</strong></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        @if($db_available)
        <div class="col-sm-12">
            <h2>Gestion Trabajador</h2>
            <div class="space-15"></div>
        </div>

        <div class="col-sm-8">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($trabajadores as  $trabador)
                    <tr >
                        <td>{{$trabador['id']}}</td>
                        <td>{{$trabador['nombre']}}</td>
                        <td>{!! link_to('delete/'.$trabador['id'], '&nbsp;x&nbsp;',  ['class' => 'btn btn-danger btn-xs', 'role' => 'button']) !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! Form::open(['class' => 'form-inline', 'method' => 'post', 'url' => 'store']) !!}
                <div class="form-group">
                    <label for="nuevo">Agregar nuevo trabajador </label>
                    <input name="nuevo" type="text" class="form-control" id="nuevo" placeholder="Jane Doe">
                </div>
                <button type="submit" class="btn btn-success">Agregar</button>
            {!! Form::close() !!}

            <div class="space-30"></div>
        </div>
        @endif

    </div>
@endsection