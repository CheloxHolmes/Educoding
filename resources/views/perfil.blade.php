@extends('layout')

@section('content')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option spad set-bg" data-setbg="{{asset('assets/img/header.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Perfil</h2>
                    <div class="breadcrumb__links">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Services Section Begin -->
<section class="services-page spad">
    <div class="container">
        @foreach($usuario as $user)
        <div class="row" style="margin-bottom:2%;">
            @if($user->username==NULL)
            <h2>Bienvenido {{ $user->name }} <img src="{{asset('assets/img/avatar/default.png')}}" height="80px" width="80px"></h2>
            @else
            <h2>Bienvenido {{ $user->username }} <img src="{{asset('assets/img/avatar/default.png')}}" height="80px" width="80px"></h2>
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
    </div>
</section>
<!-- Services Section End -->

@endsection