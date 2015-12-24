@extends('layouts.base')
@section('content')

    <h1>Detalle trabajador</h1>

    <table class="table table-condensed">
        <td class="active">

        <h2>{{$datos -> nombre}} {{$datos -> apellido_p}} {{$datos -> apellido_m}}</h2>


        <div class="form-group">
            <div class="col-sm-3">
                <label> Rut: {{$datos -> rut}} </label>
            </div>
        </div>
            <br>
        <div class="form-group">
            <div class="col-sm-3">
                <label> E-mail: {{$datos -> email}}</label>
            </div>
        </div>
            <br>
        <div class="form-group">
            <div class="col-sm-3">
                <label> Direccion: {{$datos -> direccion}}</label>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="col-sm-3">
                <label> Telefono/Celular: {{$datos -> telefono}}</label>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="col-sm-3">
                <label> Cargo: {{$datos -> cargo}}</label>
            </div>
        </div>
        </td>
    </table>

@stop

