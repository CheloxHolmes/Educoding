@extends('dashmain')

@section('dash')
@if(Auth::user()->tipo_usuario_id==2 || Auth::user()->tipo_usuario_id==1)
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active">Insignias</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        @foreach($insignia as $insg)
        <div class="card" style="width: 18rem;margin:2%;">
            <img src="{{asset('assets/img/insignias/'.$insg->descripcion)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $insg->nombre }}</h5>
                <p class="card-text"></p>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif
@endsection