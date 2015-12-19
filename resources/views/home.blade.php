@extends('layouts.base')

@section('content')



<div class="container">
	<div class="space-30"></div>
	<div class="row">
		<div class="col-sm-12">
			<h2>Características habilitadas (en desarrollo)</h2>
		</div>
	</div>
	<div class="space-30"></div>
	<div class="row box">
		<div class="col-sm-12">
			<h4>Módulo de auntentificación</h4>
			<ul class="list-unstyled">
				<li><a href="{{URL::to('auth/login')}}">Conectarse (sólo funciona si se está desconectado)</a></li>
				<li><a href="{{URL::to('auth/logout')}}">Desconectarse</a></li>
				<li><a href="{{URL::to('auth/register')}}">Registrar nuevo usuario</a></li>
			</ul>
			<div class="space-15"></div>
			<h4>Módulo de trabajadores</h4>
			<ul class="list-unstyled">
				<li><a href="{{URL::to('report')}}">Operaciones disponibles</a></li>
			</ul>
		</div>
	</div>
</div>


@endsection
