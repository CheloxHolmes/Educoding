@extends('layout')

@section('content')

<div class="container" style="margin-top:8%;margin-bottom:10%">
    <div>
        <h1>Actualizar datos</h1>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mx-auto">
                <div class="post-preview" style="margin-bottom: 8%;">
                    <div class="card">
                        <div class="card-header" style="color:white;">{{ __('Crear Mensaje') }}</div>

                        <div class="card-body">
                            <form method="POST" action="/mensaje/crear" enctype="multipart/form-data">

                                @csrf
                                @if(Session::has('datosIncorrectosMsg'))
                                <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('datosIncorrectosMsg')}}</strong></p><br>
                                @endif
                                @if(Session::has('datosIncorrectosTitulo'))
                                <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('datosIncorrectosTitulo')}}</strong></p><br>
                                @endif
                                @if(Session::has('mensajeCreado'))
                                <p style="text-align:center;"><strong class="col-md-6" style="color:green;">{{Session::get('mensajeCreado')}}</strong></p><br>
                                @endif

                                <!-- Nombres -->
                                <div class="form-group row">
                                    <label id="nombres" for="nombres" class="col-md-6 col-form-label">{{ __('Nombres')}}</label>
                                    <div class="col-md-12">
                                        <input id="nombres" type="nombres" class="form-control @error('nombres') is-invalid @enderror" min="4" max="20" name="nombres" required value="{{ old('nombres') }}" required autocomplete="nombres" autofocus>
                                    </div>
                                </div>

                                <!-- Apellido Paterno -->
                                <div class="form-group row">
                                    <label for="apellido_paterno" class="col-md-6 col-form-label">{{ __('Apellido Paterno')}}</label>
                                    <div class="col-md-12">
                                        <input id="apellido_paterno" type="apellido_paterno" class="form-control @error('apellido_paterno') is-invalid @enderror" min="4" max="20" name="apellido_paterno" required value="{{ old('apellido_paterno') }}" required autocomplete="apellido_paterno" autofocus>
                                    </div>
                                </div>

                                <!-- Apellido Materno -->

                                <div class="form-group row">
                                    <label for="apellido_materno" class="col-md-6 col-form-label">{{ __('Apellido Materno')}}</label><br>
                                    <div class="col-md-12">
                                        <input id="apellido_materno" type="apellido_materno" class="form-control @error('apellido_materno') is-invalid @enderror" min="4" max="20" name="apellido_materno" required value="{{ old('apellido_materno') }}" required autocomplete="apellido_materno" autofocus>
                                    </div>
                                </div>

                                <!-- Fecha de nacimiento -->

                                <div class="form-group row">
                                    <label for="fecha_nacimiento" class="col-md-6 col-form-label">{{ __('Fecha de Nacimiento')}}</label><br>
                                    <div class="col-md-12">
                                        <input id="fecha_nacimiento" type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" required value="{{ old('fecha_nacimiento') }}" required autocomplete="fecha_nacimiento" autofocus>
                                    </div>
                                </div>

                                <!-- Telefono -->

                                <div class="form-group row">
                                    <label for="telefono" class="col-md-6 col-form-label">{{ __('Telefono')}}</label><br>
                                    <div class="col-md-12">
                                        <input id="telefono" type="telefono" class="form-control @error('telefono') is-invalid @enderror" min="4" max="20" name="telefono" required value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                                    </div>
                                </div>

                                <!-- Nombre de Usuario -->

                                <div class="form-group row">
                                    <label for="username" class="col-md-6 col-form-label">{{ __('Nombre de Usuario')}}</label><br>
                                    <div class="col-md-12">
                                        <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" min="4" max="20" name="username" required value="{{ old('username') }}" required autocomplete="username" autofocus>
                                    </div>
                                </div>

                                <!-- Genero -->

                                <div class="form-group row">
                                    <label for="sexo" class="col-md-6 col-form-label">{{ __('Género')}}</label><br>
                                    <div class="col-md-12">
                                        <select id="sexo" name="sexo">
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                            <option value="NoDecir">Prefiero no decir</option>
                                        </select>
                                    </div>
                                </div>

                                <br>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Actualizar datos') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection