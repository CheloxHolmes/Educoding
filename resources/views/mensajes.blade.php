@extends('layout')

@section('content')

<div class="container" style="margin-top:8%;margin-bottom:10%">
    <div>
        <h1>Mensajes</h1>
    </div>
    @foreach($mensajes as $mensaje)

    <br>
    <div class="card text-left" style="margin-bottom:2%;">

        @foreach($todoUsuarios as $todos)
        @if($mensaje->id_creador==$todos->id)
        <div class="card-header">
            <p><strong>Título: </strong>{{$mensaje->titulo}}</p>
        </div>
        <div class="card-body">
            <h5 class="card-title"><strong>Por: </strong> {{$todos->name}}</h5>
            <p class="card-text">{{$mensaje->descripcion_mensaje}}</p>
        </div>
        <div class="card-footer text-muted" style="text-align: right;">
            2 days ago
        </div>
        @endif
        @endforeach

    </div>

    @endforeach
</div>

@endsection