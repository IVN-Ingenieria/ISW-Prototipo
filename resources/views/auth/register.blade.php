@extends('layouts.base')

@section('title', 'Registrando nuevo usuario')

@section('content')
<div class="container-fluid">
	<div class="row">
        <div class="space-30"></div>
        <div class="space-30"></div>
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Nuevo usuario</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> Hubo problemas con tu entrada.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">RUT</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="rut" value="{{ old('rut') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Teléfono 1</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone_1" value="{{ old('phone_1') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Teléfono 2</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone_2" value="{{ old('phone_2') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Calle</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address_street" value="{{ old('address_street') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Número</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address_number" value="{{ old('address_number') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Información adicional</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address_extra" value="{{ old('address_extra') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Ciudad</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address_city" value="{{ old('address_city') }}">
                            </div>
                        </div>

						<div class="form-group">
							<label class="col-md-4 control-label">Contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirmar contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Registrar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
        <div class="space-30"></div>
	</div>
</div>
@endsection
