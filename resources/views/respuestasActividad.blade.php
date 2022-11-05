@extends('layout')

@section('content')

<div class="container" style="margin-top:8%;margin-bottom:10%">

    @if($avatarImagen=="")
    <img src="{{asset('assets/img/avatar/'.$avatar)}}" height="150px" width="150px">
    @else
    <img src="data:image/png;base64,{{$avatarImagen}}" height="150px" width="150px">
    @endif
    <div class="row" style="margin-bottom:2%;margin-top:5%;">
        @if($usuario->username==NULL)
        <h2>Bienvenido {{ $usuario->nombres }} </h2>
        @else
        <h2>Bienvenido {{ $usuario->username }}</h2>
        @endif
    </div>
    <div>
        <a href="/perfil/actualizar/{{Auth::user()->id}}" class="btn">Actualizar mis datos</a>
    </div>
    <div class="row">
        @foreach($respuestas as $respuesta)
        <div class="col-lg-6">
            <div class="card" style="margin:1.5%;width:100%">
                <div class="card-header" style="color:white !important;">
                    <strong>Respuesta</strong>
                </div>
                <div class="card-body">
                    <p><i class="fa-solid fa-person" style="color: #F3AB67;"></i> <strong>Alumno:</strong> {{$respuesta->nombres}} {{$respuesta->apellido_paterno}}</p>
                    <p><i class="fa-solid fa-calendar" style="color: #BDB22B;"></i> <strong>Fecha:</strong> {{$respuesta->datetime_touch}}</p>
                    @foreach($colegios as $colegio)
                    @if($respuesta->colegio_id==$colegio->id)
                    <p><i class="fa-solid fa-school" style="color: #C05035;"></i> <strong>Colegio:</strong> {{$colegio->nombre}}</p>
                    @endif
                    @endforeach
                    @foreach($cursos as $curso)
                    @if($respuesta->nivel_id==$curso->id)
                    <p><i class="fa-solid fa-users" style="color: #C07D35;"></i> <strong>Curso:</strong> {{$curso->nombre}}</p>
                    @endif
                    @endforeach
                    @if($respuesta->correcta==1)
                    <p><i class="fa-solid fa-star" style="color: #7AC035;"></i> <strong>Resultado: </strong> Respuesta correcta</p>
                    @else
                    <p><i class="fa-solid fa-star" style="color: #7AC035;"></i> <strong>Resultado: </strong> Respuesta incorrecta</p>
                    @endif
                    <p><i class="fa-solid fa-indent" style="color: #7AC035;"></i> <strong>Respuesta: {{$respuesta->resultado}}</strong> </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection