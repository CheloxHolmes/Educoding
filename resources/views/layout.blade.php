<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Educoding</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/star.png')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/progressbar_barfiller.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animated-headline.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('../assets/css/style.css')}}">

    <!-- Font awesome -->

    <script src="https://kit.fontawesome.com/9e73cb0b8c.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('assets/img/logo/loder.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    @guest
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent" style="background:rgba(0, 75, 147);background: linear-gradient(to bottom, rgba(0, 75, 147) 0%, #5274ff 100%);">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="/"><img src="{{asset('assets/img/edu_logo_2.png')}}" alt="" height="80%" width="80%"></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li class="active"><a href="/"> <i class="fa fa-home"></i> Inicio</a></li>
                                                <li><a href="/login"> <i class="fa fa-map"></i> Explora la ciudad</a></li>
                                                <li><a href="/about"> <i class="fa fa-users"></i> Nosotros</a></li>
                                                <li><a href="/colegios"> <i class="fa fa-building"></i> Colegios</a>
                                                    <!--<ul class="submenu">
                                                        <li><a href="blog.html">Blog</a></li>
                                                        <li><a href="blog_details.html">Blog Details</a></li>
                                                        <li><a href="elements.html">Element</a></li>
                                                    </ul>-->
                                                </li>
                                                <li><a href="/contacto"> <i class="fa fa-envelope"></i> Contacto</a></li>
                                                <!-- Button -->
                                                <li class="button-header margin-left "><a href="/register" class="btn">Registrarse</a></li>
                                                <li class="button-header"><a href="/login" class="btn">Iniciar sesión</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    @endguest
    @auth
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent" style="background:rgba(0, 75, 147);background: linear-gradient(to bottom, rgba(0, 75, 147) 0%, #5274ff 100%);">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="/"><img src="{{asset('assets/img/edu_logo_2.png')}}" alt="" height="80%" width="80%"></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li class="active"><a href="/"> <i class="fa fa-home"></i> Inicio</a></li>
                                                <li><a href="/explorar/{{Auth::id()}}"> <i class="fa fa-map"></i> Explora la ciudad</a></li>
                                                <li><a href="/about"> <i class="fa fa-users"></i> Nosotros</a></li>
                                                <li><a href="/colegios"> <i class="fa fa-building"></i> Colegios</a>
                                                    <!--<ul class="submenu">
                                                        <li><a href="blog.html">Blog</a></li>
                                                        <li><a href="blog_details.html">Blog Details</a></li>
                                                        <li><a href="elements.html">Element</a></li>
                                                    </ul>-->
                                                </li>
                                                <li><a href="/contacto"> <i class="fa fa-envelope"></i> Contacto</a></li>
                                                <!-- Button -->
                                                <li class="dropdown">
                                                    @if(Auth::user()->username==NULL)
                                                    <a class="btn dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user"></i> {{ Auth::user()->nombres }}</a>
                                                    @else
                                                    <a class="btn dropdown-toggle" role="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user"></i> {{ Auth::user()->username }}</a>
                                                    @endif
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a style="color:black;" class="dropdown-item" href="/perfil/{{ Auth::user()->id }}">Perfil</a></li>
                                                        @if(Auth::user()->tipo_usuario_id=="2")
                                                        <li><a style="color:black;" class="dropdown-item" href="/dashboard/{{ Auth::user()->id }}">Dashboard</a></li>
                                                        @endif
                                                        @if(Auth::user()->tipo_usuario_id=="1")
                                                        <li><a style="color:black;" class="dropdown-item" href="/admin/{{ Auth::user()->id }}">Administración</a></li>
                                                        @endif
                                                        <li><a style="color:black;" class="dropdown-item" href="{{ route('logout') }}">Cerrar sesión</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    @endauth
    <main>

        @yield('content')
    </main>
    <footer>
        <div class="footer-wrappper footer-bg">
            <!-- Footer Start-->
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo mb-25">
                                        <a href="index.html"><img src="{{asset('assets/img/edu_logo_2.png')}}" alt="" height="80%" width="80%"></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>Programa de Gestión de la Calidad y Seguimiento de los Aprendizajes
                                                Dirección de Extensión y Comunicaciones Facultad de Filosofía y Humanidades
                                                Universidad de Chile.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Nosotros</h4>
                                    <ul>
                                        <li><a href="tel:56-2-2978-7011"><i class="fa-solid fa-phone"></i> 56-2 2978 7011</a></li>
                                        <li><a target="_blank" href="https://goo.gl/maps/GFjnJiB7WGPWZQnQA"><i class="fa-solid fa-location-pin"></i> Av. Capitán Ignacio Carrera Pinto 1025, 5º piso, Ñuñoa - Santiago de Chile</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>SITIO</h4>
                                    <ul>
                                        <li><a href="http://ulearnet.org/preguntas-frecuentes/" target="blank">FaQ</a></li>
                                        <li><a href="http://ulearnet.org/libro-modelo-saep/" target="blank">Modelo SAEP</a></li>
                                        <li><a href="http://formacion.ulearnet.org/" target="blank">Plataforma Ulearnet</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom area -->
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        uLearnet &copy;
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script> Todos los derechos reservados
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End-->
        </div>
    </footer>
    
    <!-- JS here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="{{asset('../assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('../assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('../assets/js/popper.min.js')}}"></script>
    <script src="{{asset('../assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('../assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('../assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('../assets/js/slick.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('../assets/js/wow.min.js')}}"></script>
    <script src="{{asset('../assets/js/animated.headline.js')}}"></script>
    <script src="{{asset('../assets/js/jquery.magnific-popup.js')}}"></script>

    <!-- Date Picker -->
    <script src="{{asset('../assets/js/gijgo.min.js')}}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{asset('../assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('../assets/js/jquery.sticky.js')}}"></script>
    <!-- Progress -->
    <script src="{{asset('../assets/js/jquery.barfiller.js')}}"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="{{asset('../assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('../assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('../assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('../assets/js/hover-direction-snake.min.js')}}"></script>

    <!-- contact js -->
    <script src="{{asset('../assets/js/contact.js')}}"></script>
    <script src="{{asset('../assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('../assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('../assets/js/mail-script.js')}}"></script>
    <script src="{{asset('../assets/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{asset('../assets/js/plugins.js')}}"></script>
    <script src="{{asset('../assets/js/main.js')}}"></script>

</body>

</html>