@extends('layouts.base')
@section('content')

<br>
    <div class = "panel panel-default">
    <div class = "panel-heading" >Detalles de AFP</div>
        <table class = "table table-responsive table-bordered">
            <thead>
                <tr>
                    <th> Id </th>
                    <th> Rut </th>
                    <th> Fono </th>
                    <th> Comision </th>
                    <th> Sitio </th>
                </tr>
            </thead>

        <tbody>

            <tr>
                <td> {{ $afp->id }} </td>
                <td> {{ $afp->nombre }} </td>
                <td> {{ $afp->fono }}</td>
                <td> {{ $afp->comision }}</td>
                <td> {{ $afp->sitio }}</td>
            </tr>

        </tbody>
        </table>

</div>
@stop