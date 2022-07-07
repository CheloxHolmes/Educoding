@extends('layout')

@section('content')

<div class="container" style="margin-top:8%;margin-bottom:10%">

    <img src="{{asset('assets/img/avatar/'.$avatar)}}" height="150px" width="150px">
    <div class="row" style="margin-bottom:2%;margin-top:5%;">
        @if($usuario->username==NULL)
        <h2>Bienvenido {{ $usuario->nombres }} </h2>
        @else
        <h2>Bienvenido {{ $usuario->username }}</h2>
        @endif
    </div>
    <div class="row">
        <div class="card" style="margin:1.5%;width:45%">
            <div class="card-header">
                <strong>Estado</strong>
            </div>
            <div class="card-body">
                <p><i class="fa-solid fa-person" style="color: #F3AB67;"></i> <strong>Rol:</strong> {{ Auth::user()->rol }}</p>
                <p><i class="fa-solid fa-coins" style="color: #BDB22B;"></i> <strong>Ulearnet Coins:</strong> {{ Auth::user()->coins }}</p>
                <p><i class="fa-solid fa-bars-progress" style="color: #7AC035;"></i> <strong>Módulos Completados: </strong>{{ Auth::user()->ModulosCompletados }}</p>
            </div>
        </div>
        <div class="card" style="margin:1.5%;width:45%">
            <div class="card-header">
                <strong>Insignias</strong>
            </div>
            <div class="card-body">
                <h5 class="card-title">¡Aquí exponemos tu honor!</h5>
                <p class="card-text">Aquí van tus insignias</p>
                <a href="#" class="btn">Ver más</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card" style="margin:1.5%;width:45%">
            <div class="card-header">
                <strong>Amigos</strong>
            </div>
            <div class="card-body">
                <h5 class="card-title">Toma contacto con tus amigos</h5>
                <p class="card-text">Aquí podrás ver tus amigos en la plataforma</p>
                <a href="#" class="btn">Buscar amigos</a>
            </div>
        </div>
        <div class="card" style="margin:1.5%;width:45%">
            <div class="card-header">
                <strong>Módulos completados</strong>
            </div>
            <div class="card-body">
                <h5 class="card-title">Aquí podrás ver los módulos que has finalizado</h5>
                <p class="card-text">Ve el progreso que has realizado por la plataforma</p>
                <a href="#" class="btn">Ver más</a>
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
                <a href="/perfil/avatar/user-(1).png"><img src="{{asset('assets/img/avatar/user-(1).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/avatar/user-(2).png"><img src="{{asset('assets/img/avatar/user-(2).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/avatar/user-(3).png"><img src="{{asset('assets/img/avatar/user-3.png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/avatar/user-(4).png"><img src="{{asset('assets/img/avatar/user-7.png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/avatar/user-(5).png"><img src="{{asset('assets/img/avatar/user-(5).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/avatar/user-(6).png"><img src="{{asset('assets/img/avatar/user-(6).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/avatar/user-(7).png"><img src="{{asset('assets/img/avatar/user-(7).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/avatar/user-(8).png"><img src="{{asset('assets/img/avatar/user-(8).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/avatar/user-(9).png"><img src="{{asset('assets/img/avatar/user-(9).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/avatar/user-(10).png"><img src="{{asset('assets/img/avatar/user-(10).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/avatar/user-(11).png"><img src="{{asset('assets/img/avatar/user-(11).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/avatar/user-(12).png"><img src="{{asset('assets/img/avatar/user-(12).png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/avatar/user-13.png"><img src="{{asset('assets/img/avatar/user-13.png')}}" alt="Admin" class="rounded-circle" width="150"></a>
                <a href="/perfil/avatar/user-14.png"><img src="{{asset('assets/img/avatar/user-14.png')}}" alt="Admin" class="rounded-circle" width="150"></a>
            </div>
            <br>
        </div>
        <br>
    </div>
</div>


@endsection