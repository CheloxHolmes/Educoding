@extends('layout')

@section('content')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option spad set-bg" data-setbg="assets/img/header.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Aprende</h2>
                    <div class="breadcrumb__links">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Aprende Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="{{asset('assets/img/modulos/python.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Python básico</h5>
                                <p class="card-text">Un curso con los conceptos más básicos de python.</p>
                                <p>Dificultad:</p>
                                <div class="star-rating">
                                    <a>★</a>
                                </div>
                                <a class="card-text"><small class="text-muted">Ver más</small></a>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="{{asset('assets/img/modulos/Programacion.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Conceptos de programación</h5>
                                <p class="card-text">Este curso de conceptos de programación básicos te ayudará a comprender de manera conceptual una idea general de este mundo.</p>
                                <p>Dificultad:</p>
                                <div class="star-rating">
                                    <a>★</a>
                                </div>
                                <a class="card-text"><small class="text-muted">Ver más</small></a>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="{{asset('assets/img/modulos/html.png')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">HTML Básico</h5>
                                <p class="card-text">Algunos conceptos básicos de HTML. También se abordará información sobre etiquetas.</p>
                                <p>Dificultad:</p>
                                <div class="star-rating">
                                    <a>★</a>
                                </div>
                                <a class="card-text"><small class="text-muted">Ver más</small></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="{{asset('assets/img/modulos/Programacion.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Conceptos de variables</h5>
                                <p class="card-text">Este módulo orientará en mayor detalle y de forma conceptual todo lo relacionado a las variables.</p>
                                <p>Dificultad:</p>
                                <div class="star-rating">
                                    <a>★</a>
                                </div>
                                <a class="card-text"><small class="text-muted">Ver más</small></a>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="{{asset('assets/img/modulos/html.png')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">HTML Básico</h5>
                                <p class="card-text">Algunos conceptos básicos de HTML. También se abordará información sobre etiquetas.</p>
                                <p>Dificultad:</p>
                                <div class="star-rating">
                                    <a>★</a>
                                </div>
                                <a class="card-text"><small class="text-muted">Ver más</small></a>
                            </div>
                        </div>
                        <div class="card">
                            <img class="card-img-top" src="{{asset('assets/img/modulos/Programacion.jpg')}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Conceptos de variables</h5>
                                <p class="card-text">Este módulo orientará en mayor detalle y de forma conceptual todo lo relacionado a las variables.</p>
                                <p>Dificultad:</p>
                                <div class="star-rating">
                                    <a>★</a>
                                </div>
                                <a href="#" class="card-text"><small class="text-muted">Ver más</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

@endsection