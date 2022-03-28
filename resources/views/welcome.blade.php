    @extends('layout')

    @section('content')

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="{{asset('assets/img/hero/hero-1.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <span>La mejor manera de aprender es haciendo. Completa desafíos para conseguir recompensas</span>
                                <h2>Educoding</h2>
                                <a href="/aprende" class="primary-btn" style="color:white;">Ver los módulos disponibles</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Aprende Section Begin -->
    <section class="services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="services__title">
                        <div class="section-title">
                            <h2>Módulos de aprendizaje</h2>
                            <br>
                            <span>Aprende a tu ritmo y aplica tus conocimientos</span>
                            <br>
                            <a href="/aprende" class="primary-btn">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    @endsection