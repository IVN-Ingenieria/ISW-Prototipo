@extends('layouts.base')

@section('content')
<div class="container-fluid">
	<div class="space-30"></div>
	<div class="space-30"></div>
	<div class="row box">
		<div class="col-md-8 col-md-offset-2">
			<h2>Ingrese con sus credenciales</h2>
			<div class="space-15"></div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="space-15"></div>
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Hubo algunos problemas con tu entrada.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Correo electrónico</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Recuérdame
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Ingresar</button>

								<a class="btn btn-link" href="{{ url('/auth/register') }}">Registrar nuevo usuario</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="space-30"></div>
</div>
@endsection
