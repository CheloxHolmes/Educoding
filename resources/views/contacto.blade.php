@extends('layout')

@section('content')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option spad set-bg" data-setbg="{{asset('assets/img/header.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contacto</h2>
                        <div class="breadcrumb__links">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

<!-- Contact Widget Section Begin -->
<!--<section class="contact-widget spad">
    <div class="container" style="margin-top:5%;">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-md-6 col-md-3">
                <div class="contact__widget__item">
                    <div class="contact__widget__item__icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="contact__widget__item__text">
                        <h4>Address</h4>
                        <p>Los Angeles Gournadi, 1230 Bariasl</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-md-6 col-md-3">
                <div class="contact__widget__item">
                    <div class="contact__widget__item__icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="contact__widget__item__text">
                        <h4>Hotline</h4>
                        <p>1-677-124-44227 • 1-688-356-66889</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-md-6 col-md-3">
                <div class="contact__widget__item">
                    <div class="contact__widget__item__icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="contact__widget__item__text">
                        <h4>Email</h4>
                        <p>Support@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->
<!-- Contact Widget Section End -->

<!-- Call To Action Section Begin -->
<section class="contact spad" style="margin-top:5%;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d425998.14892663143!2d-70.9100195384674!3d-33.472472762753654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c5410425af2f%3A0x8475d53c400f0931!2sSantiago%2C%20Regi%C3%B3n%20Metropolitana!5e0!3m2!1ses!2scl!4v1648414068137!5m2!1ses!2scl" width="100%" height="400px" style="border:0;"></iframe>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form">
                    <h3>Contáctenos</h3>
                    <form action="#">
                        <input required type="text" class="form-control" placeholder="Nombre"><br>
                        <input required type="text" class="form-control" placeholder="Email"><br>
                        <textarea required class="form-control" placeholder="Mensaje"></textarea><br>
                        <button type="submit" class="btn btn-primary site-btn">Enviar mensaje</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Call To Action Section End -->

@endsection