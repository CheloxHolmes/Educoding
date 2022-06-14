@extends('layout')

@section('content')

<div class="container" style="margin-top:8%;margin-bottom:10%">
    <div>
        <h1>Mensajes</h1>
    </div>
    @foreach($mensajes as $mensaje)

    <br>
    <div class="card border-dark mb-3 text-left" style="margin-bottom:2%;border-radius:5px;">

        @foreach($todoUsuarios as $todos)
        @if($mensaje->id_creador==$todos->id)
        <div class="card-header">
            <h1><strong>Título: </strong>{{$mensaje->titulo}}</h1>
        </div>
        <div class="card-body">
            <h2 class="card-title"><strong>Por: </strong> {{$todos->name}}</h2>
            <p class="card-text">{{$mensaje->descripcion_mensaje}}</p>
        </div>
        <div class="card-footer text-muted" style="text-align: right;height:45px;">
            <p>2 days ago</p>
        </div>
        @endif
        @endforeach

    </div>

    @endforeach
</div>

@endsection