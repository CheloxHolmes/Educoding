@extends('layout')

@section('content')
@if(Auth::user()->tipo_usuario_id==2 || Auth::user()->tipo_usuario_id==1)
<div class="container" style="margin-top:8%;margin-bottom:10%">
    <div>
        <h1>Registrar Curso</h1>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mx-auto">
                <div class="post-preview" style="margin-bottom: 8%;">
                    <div class="card">
                        <div class="card-header" style="color:white;">{{ __('Aqui puedes registrar un curso en la plataforma Educoding') }}</div>

                        <div class="card-body">
                            <form method="POST" action="/registrar/curso" enctype="multipart/form-data">

                                @csrf
                                @if(Session::has('fail'))
                                <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('fail')}}</strong></p><br>
                                @endif
                                @if(Session::has('success'))
                                <p style="text-align:center;"><strong class="col-md-6" style="color:green;">{{Session::get('success')}}</strong></p><br>
                                @endif

                                <!-- Curso -->
                                <div class="form-group row">
                                    <label id="nivel_id" for="nivel_id" class="col-md-6 col-form-label">{{ __('Curso')}}</label>
                                    <div class="col-md-12">
                                        <select id="nivel_id" name="nivel_id">
                                            @foreach($cursos as $curso)
                                            <option value="{{$curso->id}}">{{$curso->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Letra del curso -->
                                <div class="form-group row">
                                    <label for="letra_id" class="col-md-6 col-form-label">{{ __('Letra del curso')}}</label>
                                    <div class="col-md-12">
                                        <select id="letra_id" name="letra_id">
                                            @foreach($letras as $letra)
                                            <option value="{{$letra->id}}">{{$letra->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Periodo -->
                                <div class="form-group row">
                                    <label for="periodo_id" class="col-md-6 col-form-label">{{ __('Periodo')}}</label><br>
                                    <div class="col-md-12">
                                        <select id="periodo_id" name="periodo_id">
                                            @foreach($periodos as $periodo)
                                            <option value="{{$periodo->id}}">{{$periodo->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Colegio -->
                                <div class="form-group row">
                                    <label for="rut" class="col-md-6 col-form-label">{{ __('Colegio')}}</label><br>
                                    <div class="col-md-12">
                                        <select id="colegio_id" name="colegio_id">
                                            @foreach($colegios as $colegio)
                                            <option value="{{$colegio->id}}">{{$colegio->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <br>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Registrar Curso') }}
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