    @extends('layout')

    @section('content')

    <!--? slider Area Start-->
    <section class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-12">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay="0.2s"><br>Educoding</h1>
                                <p data-animation="fadeInLeft" data-delay="0.4s">La mejor manera de aprender es haciendo. Completa actividades para conseguir recompensas</p>
                                <a href="/explorar" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Explorar la ciudad</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Actividades</h2>
                    </div>
                </div>
            </div>
            <div class="courses-actives">
                <!-- Single -->
                <div class="properties pb-20">
                    <div class="properties__card">
                        <div class="properties__img overlay1">
                            <a href="#"><img src="{{asset('assets/img/gallery/historia.jpg')}}" alt=""></a>
                        </div>
                        <div class="properties__caption">
                            <p>Historia - HI01 OA 05</p>
                            <h3><a href="#">Identidad nacional e identidades locales</a></h3>
                            <p>Reconocer los símbolos representativos de Chile / Colombia / México (como la bandera, el escudo y el himno nacional), describir costumbres, actividades y la participación de hombres y mujeres respecto de conmemoraciones nacionales.

                            </p>
                            <a href="https://www.curriculumnacional.cl/portal/Documentos-Curriculares/Programas/#doc_tp" target="blank" class="border-btn border-btn2">Ver en curriculum nacional</a>
                        </div>

                    </div>
                </div>
                <!-- Single -->
                <!-- Single -->
                <div class="properties pb-20">
                    <div class="properties__card">
                        <div class="properties__img overlay1">
                            <a href="#"><img src="{{asset('assets/img/gallery/matematicas.jpg')}}" alt=""></a>
                        </div>
                        <div class="properties__caption">
                            <p>Matemáticas - MA01 OA 09</p>
                            <h3><a href="#">Adición y sustracción de números</a></h3>
                            <p>Demostrar que comprenden la adición y la sustracción de números del 0 al 20 progresivamente, de 0 a 5, de 6 a 10, de 11 a 20, con dos sumandos.
                            </p>
                            <p>
                                Representando adiciones y sustracciones con material concreto y pictórico, de manera manual y/o usando software educativo.
                            </p>
                            <a href="https://www.curriculumnacional.cl/portal/Documentos-Curriculares/Programas/#doc_tp" target="blank" class="border-btn border-btn2">Ver en curriculum nacional</a>
                        </div>
                    </div>
                </div>
                <!-- Single -->
                <!-- Single -->
                <div class="properties pb-20">
                    <div class="properties__card">
                        <div class="properties__img overlay1">
                            <a href="#"><img src="{{asset('assets/img/gallery/artes.jpg')}}" alt=""></a>
                        </div>
                        <div class="properties__caption">
                            <p>Artes - ARo3 OA 01</p>
                            <h3><a href="#">Fundamental of UX for Application design</a></h3>
                            <p>Crear trabajos de arte con un propósito expresivo personal y basados en la observación del: entorno natural: animales, plantas y fenómenos naturales; entorno cultural: creencias de distintas culturas (mitos, seres imaginarios, dioses, fiestas, tradiciones, otros);entorno artístico: arte de la Antigüedad y movimientos artísticos como fauvismo, expresionismo y art nouveau.

                            </p>
                            <a href="https://www.curriculumnacional.cl/portal/Documentos-Curriculares/Programas/#doc_tp" target="blank" class="border-btn border-btn2">Ver en curriculum nacional</a>
                        </div>

                    </div>
                </div>
                <!-- Single -->
                <!-- Single -->
                <!--<div class="properties pb-20">
                    <div class="properties__card">
                        <div class="properties__img overlay1">
                            <a href="#"><img src="assets/img/gallery/featured2.png" alt=""></a>
                        </div>
                        <div class="properties__caption">
                            <p>Inglés</p>
                            <h3><a href="#">Fundamental of UX for Application design</a></h3>
                            <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.

                            </p>
                            <div class="properties__footer d-flex justify-content-between align-items-center">
                                <div class="restaurant-name">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half"></i>
                                    </div>
                                    <p><span>(4.5)</span> based on 120</p>
                                </div>
                                <div class="price">
                                    <span>$135</span>
                                </div>
                            </div>
                            <a href="#" class="border-btn border-btn2">Find out more</a>
                        </div>

                    </div>
                </div>-->
                <!-- Single -->
            </div>
        </div>
    </div>
    <!-- Courses area End -->
    <!--? About Area-2 Start -->
    <section class="about-area2 fix pb-padding">
        <div class="support-wrapper align-items-center">
            <div class="right-content2">
                <!-- img -->
                <div class="right-img">
                    <img src="assets/img/gallery/City.jpg" alt="">
                </div>
            </div>
            <div class="left-content2">
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-20">
                    <div class="front-text">
                        <h2 class="">Salva a la ciudad de Educoding para revertir el hechizo en el que han caído sus ciudadanos.</h2>
                        <p>La hermosa ciudad de Educoding y sus habitantes han sido hechizados por el mago Extrañín. Mago que promueve la buena salud, la conciencia por el medioambiente, la creatividad, y la inteligencia.</p>

                        <p>El mago al ver que los habitantes de Educoding no cumplían con su pensamiento de vida, ha iniciado charlas comunitarias a los habitantes para que tomen conciencia y comiencen a promover sus ideales. Sin embargo, los habitantes prefieren la buena vida, ensuciar el medioambiente, y negarse a aprender cosas nuevos o desarrollar nuevas habilidades creativas.</p>

                        <p>Finalmente el mago abrumado por la actitud de los habitantes, ha hechizado la ciudad de Educoding convirtiéndola en un tablero de juego con sus habitantes atrapados en ella.</p>

                        <p>La misión del estudiante es completar módulos y comprar artefactos en la tienda para devolver a la realidad a los habitantes de Educoding.</p>
                        <a href="/explorar" class="btn">Explora la ciudad</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->

    @endsection