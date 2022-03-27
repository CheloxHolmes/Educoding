<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Videograph Template">
    <meta name="keywords" content="Videograph, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Educoding</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css">

    <!-- Font awesome -->

    <script src="https://kit.fontawesome.com/9e73cb0b8c.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header" style="background-image: url('assets/img/header.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="/"><img src="{{asset('assets/img/logo2/logo_transparent.png')}}" alt="" height="70%" width="70%"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="header__nav__option">
                        <nav class="header__nav__menu mobile-menu">
                            <ul>
                                <li><a href="/about"><i class="fa-solid fa-user"></i> Nosotros</a></li>
                                <li><a href="/Aprende"><i class="fa-solid fa-book-open"></i> Aprende</a></li>
                                <li><a href="#"><i class="fa-solid fa-building-columns"></i> Comunidades</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Escuelas</a></li>
                                        <li><a href="#">Universidades</a></li>
                                    </ul>
                                </li>
                                <li><a href="/contacto"><i class="fa-solid fa-envelope"></i> Contacto</a></li>
                            </ul>
                        </nav>
                        <div class="header__nav__social" style="color:aliceblue;">
                            <a class="btn btn-info" href="/login">Iniciar sesión</a>
                            <a class="btn btn-info" href="/register">Registrarse</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->
    <center>
        <main class="services spad">

            @yield('content')

        </main>
    </center>
    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="footer__top">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="footer__top__logo">
                            <a href="/"><img src="{{asset('assets/img/logo2/logo_transparent.png')}}" alt="" height="100px" width="100px"></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer__top__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__option">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="footer__option__item">
                            <h5>Sobre nosotros</h5>
                            <p>Educoding es una iniciativa creada por Marcelo Carreño en conjunto con Ulearnet el año 2022.</p>
                            <!--<p>La iniciativa tiene como principal fin apoyar a las comunidades de aprendizaje, tomando foco tanto en alumnos y alumnas como profesores y profesoras.</p>-->
                            <a href="/about" class="read__more">Leer más <span class="arrow_right"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="footer__option__item">
                            <h5>Colaboraciones</h5>
                            <ul>
                                <li><a href="http://www.unab.cl/">Unab</a></li>
                                <li><a href="https://www.uchile.cl/">Universidad de Chile</a></li>
                                <li><a href="http://ulearnet.org/">Ulearnet</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Si se agrega este, cambiar col-lg-6 por 4<div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="footer__option__item">
                            <h5>Our work</h5>
                            <ul>
                                <li><a href="#">Feature</a></li>
                                <li><a href="#">Latest</a></li>
                                <li><a href="#">Browse Archive</a></li>
                                <li><a href="#">Video for web</a></li>
                            </ul>
                        </div>
                    </div>-->
                    <div class="col-lg-4 col-md-12">
                        <div class="footer__option__item">
                            <h5>REIM</h5>
                            <ul>
                                <li><a href="http://ulearnet.org/nuestros-reim/" target="blank">Aprende más acerca de los REIM.</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__copyright">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p class="footer__copyright__text">Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            Educoding, todos los derechos reservados <i class="fa fa-heart-o" aria-hidden="true"></i> <a href="http://ulearnet.org/nuestros-reim/" target="_blank">Ulearnet</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/mixitup.min.js')}}"></script>
    <script src="{{asset('assets/js/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>