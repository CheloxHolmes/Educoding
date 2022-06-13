@extends('dashmain')

@section('dash')
@if(Auth::user()->rol=="profesor")
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
    @foreach($insignia as $ing)
        <div class="card" style="width: 18rem;margin:2%;">
            <img src="{{asset('assets/img/insignias/'.$ing->imagen)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $ing->titulo }}</h5>
                <p class="card-text">{{ $ing->descripcion }}</p>
            </div>
        </div>
    @endforeach
    </div>
</section>
@endif
@endsection