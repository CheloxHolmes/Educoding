@extends('layout')

@section('content')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option spad set-bg" data-setbg="assets/img/header.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Nosotros</h2>
                    <div class="breadcrumb__links">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about__pic">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="about__pic__item about__pic__item--large set-bg"
                                    data-setbg="{{asset('assets/img/about/about-1.jpg')}}"></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="about__pic__item set-bg" data-setbg="{{asset('assets/img/about/about-2.jpg')}}"></div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="about__pic__item set-bg" data-setbg="{{asset('assets/img/about/about-3.jpg')}}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__text">
                        <div class="section-title">
                            <span>Educoding</span>
                            <h2>¿Quiénes somos?</h2>
                        </div>
                        <div class="row">
                        <div class="about__text__desc">
                            <p>Educoding es una iniciativa creada por Marcelo Carreño en conjunto con Ulearnet el año 2022.</p>
                            <p>La iniciativa tiene como principal fin apoyar a las comunidades de aprendizaje, tomando foco tanto en alumnos y alumnas como profesores y profesoras.</p>
                            <p>Se espera que se adieran muchas más comunidades educativas que puedan aportar ideas, módulos de aprendizaje y estadísticas para mejorar la formación de los estudiantes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

@endsection