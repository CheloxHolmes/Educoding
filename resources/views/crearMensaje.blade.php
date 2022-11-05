@extends('layout')

@section('content')
@if(Auth::user()->tipo_usuario_id!=3)
<div class="container" style="margin-top:8%;margin-bottom:10%">
    <div>
        <h1>Crear Mensaje</h1>
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

                            <!-- Para -->
                            <div class="form-group row">
                                <label id="id_receptor" for="id_receptor" class="col-md-6 col-form-label">{{ __('Receptor')}}</label>
                                <div class="col-md-12">
                                    <select name="id_receptor">
                                        @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}">{{$usuario->nombres}} {{$usuario->apellido_paterno}} {{$usuario->apellido_materno}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Titulo -->
                            <div class="form-group row">
                                <label for="titulo" class="col-md-6 col-form-label">{{ __('Titulo')}}</label>
                                <div class="col-md-12">
                                    <input id="titulo" type="titulo" class="form-control @error('titulo') is-invalid @enderror" min="4" max="50" name="titulo" required value="{{ old('titulo') }}" required autocomplete="titulo" autofocus>
                                </div>
                            </div>

                            <!-- Descripción -->

                            @if(Session::has('datosIncorrectosDescripcion'))
                            <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('datosIncorrectosDescripcion')}}</strong></p><br>
                            @endif
                            @if(Session::has('datosIncorrectosDescripcionMax'))
                            <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('datosIncorrectosDescripcionMax')}}</strong></p><br>
                            @endif

                            <div class="form-group row">
                                <label for="descripcion" class="col-md-6 col-form-label">{{ __('Descripción')}}</label><br>
                                <div class="col-md-12">
                                    <textarea id="descripcion" type="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" required value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus></textarea>
                                </div>
                            </div>

                            <br>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enviar mensaje') }}
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
@endif
@if(Auth::user()->tipo_usuario_id==3)
<div class="container" style="margin-top:8%;margin-bottom:10%">
    <div>
        <h1>Crear Mensaje</h1>
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

                            <!-- Para -->
                            <div class="form-group row">
                                <label id="id_receptor" for="id_receptor" class="col-md-6 col-form-label">{{ __('Receptor')}}</label>
                                <div class="col-md-12">
                                    <select name="id_receptor">
                                        @foreach($usuarios as $usuario)
                                        @if($usuario->tipo_usuario_id==2)
                                        <option value="{{ $usuario->id }}">{{$usuario->nombres}} {{$usuario->apellido_paterno}} {{$usuario->apellido_materno}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Titulo -->
                            <div class="form-group row">
                                <label for="titulo" class="col-md-6 col-form-label">{{ __('Titulo')}}</label>
                                <div class="col-md-12">
                                    <input id="titulo" type="titulo" class="form-control @error('titulo') is-invalid @enderror" min="4" max="50" name="titulo" required value="{{ old('titulo') }}" required autocomplete="titulo" autofocus>
                                </div>
                            </div>

                            <!-- Descripción -->

                            @if(Session::has('datosIncorrectosDescripcion'))
                            <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('datosIncorrectosDescripcion')}}</strong></p><br>
                            @endif
                            @if(Session::has('datosIncorrectosDescripcionMax'))
                            <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('datosIncorrectosDescripcionMax')}}</strong></p><br>
                            @endif

                            <div class="form-group row">
                                <label for="descripcion" class="col-md-6 col-form-label">{{ __('Descripción')}}</label><br>
                                <div class="col-md-12">
                                    <textarea id="descripcion" type="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" required value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus></textarea>
                                </div>
                            </div>

                            <br>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enviar mensaje') }}
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
@endif
@endsection