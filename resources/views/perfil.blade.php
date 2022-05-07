@extends('layout')

@section('content')

<div class="container" style="margin-top:8%;margin-bottom:10%">
    @foreach($usuario as $user)
    <img src="{{asset('assets/img/avatar/'.Auth::user()->avatar)}}" height="150px" width="150px">
    <div class="row" style="margin-bottom:2%;margin-top:5%;">
        @if($user->username==NULL)
        <h2>Bienvenido {{ $user->name }} </h2>
        @else
        <h2>Bienvenido {{ $user->username }}</h2>
        @endif
        @endforeach
    </div>
    <div class="row">
        <div class="card" style="margin:1.5%;width:45%">
            <div class="card-header">
                Estado
            </div>
            <div class="card-body">
                <h5 class="card-title">Nivel 6 <strong>[Programador Junior]</strong></h5>
                <p class="card-text">Experiencia (25%)</p>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="card" style="margin:1.5%;width:45%">
            <div class="card-header">
                Insignias
            </div>
            <div class="card-body">
                <h5 class="card-title">¡Aquí exponemos tu honor!</h5>
                <p class="card-text">Aquí van tus insignias</p>
                <a href="#" class="btn btn-info">Ver más</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card" style="margin:1.5%;width:45%">
            <div class="card-header">
                Amigos
            </div>
            <div class="card-body">
                <h5 class="card-title">Toma contacto con tus amigos</h5>
                <p class="card-text">Aquí podrás ver tus amigos en la plataforma</p>
                <a href="#" class="btn btn-info">Buscar amigos</a>
            </div>
        </div>
        <div class="card" style="margin:1.5%;width:45%">
            <div class="card-header">
                Módulos completados
            </div>
            <div class="card-body">
                <h5 class="card-title">Aquí podrás ver los módulos que has finalizado</h5>
                <p class="card-text">Ve el progreso que has realizado por la plataforma</p>
                <a href="#" class="btn btn-info">Ver más</a>
            </div>
        </div>
    </div>
    <br>
    <div style="text-align:center;">
        <h2>Actualizar avatar</h2>
    </div>
    <br>
    <div class="row">
        <div class="d-flex justify-content-center">
            <div>
                <a href="/perfil/{{Auth::user()->id}}/user-(1).png"><img src="{{asset('assets/img/avatar/user-(1).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/{{Auth::user()->id}}/user-(2).png"><img src="{{asset('assets/img/avatar/user-(2).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/{{Auth::user()->id}}/user-(3).png"><img src="{{asset('assets/img/avatar/user-3.png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/{{Auth::user()->id}}/user-(4).png"><img src="{{asset('assets/img/avatar/user-7.png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/{{Auth::user()->id}}/user-(5).png"><img src="{{asset('assets/img/avatar/user-(5).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/{{Auth::user()->id}}/user-(6).png"><img src="{{asset('assets/img/avatar/user-(6).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/{{Auth::user()->id}}/user-(7).png"><img src="{{asset('assets/img/avatar/user-(7).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/{{Auth::user()->id}}/user-(8).png"><img src="{{asset('assets/img/avatar/user-(8).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/{{Auth::user()->id}}/user-(9).png"><img src="{{asset('assets/img/avatar/user-(9).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/{{Auth::user()->id}}/user-(10).png"><img src="{{asset('assets/img/avatar/user-(10).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/{{Auth::user()->id}}/user-(11).png"><img src="{{asset('assets/img/avatar/user-(11).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/{{Auth::user()->id}}/user-(12).png"><img src="{{asset('assets/img/avatar/user-(12).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/{{Auth::user()->id}}/user-13.png"><img src="{{asset('assets/img/avatar/user-13.png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/{{Auth::user()->id}}/user-14.png"><img src="{{asset('assets/img/avatar/user-14.png')}}" alt="Admin" class="rounded-circle" width="150"></a>
            </div>
            <br>
        </div>
        <br>
    </div>
</div>


@endsection