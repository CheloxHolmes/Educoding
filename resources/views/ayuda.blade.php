@extends('dashmain')
@section('dash')
@if(Auth::user()->tipo_usuario_id==2 || Auth::user()->tipo_usuario_id==1)

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active">Ayuda</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="accordion" id="accordionExample">
        <!-- 1 -->
        <!--<div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Registrar alumno en un curso
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Para registrar un alumno en un determinado curso, debemos seleccionar una de las opciones del panel izquierdo del dashboard. En este caso el botón <strong>"Alumnos"</strong>.</strong></p>
                    <br>
                    <img src="https://i.imgur.com/88Xjpek.png" class="rounded mx-auto d-block">
                    <br>
                    <img src="https://i.imgur.com/L4k64MR.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Luego debemos presionar el botón <strong>"Registrar alumnos" y apareceremos en el menú que nos permite asignar curso a un estudiante de la plataforma.</strong></p>
                    <br>
                    <img src="https://i.imgur.com/gTpkzrX.png" class="rounded mx-auto d-block">
                </div>
            </div>
        </div>-->
        <!-- 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Ver dibujos de un estudiante
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Para ver los dibujos realizados en Actividad de Lenguaje o "Literatura mágica" de un estudiante, se debe acceder inicialmente al panel izquierdo.</p>
                    <br>
                    <img src="https://i.imgur.com/88Xjpek.png" class="rounded mx-auto d-block">
                    <p>Luego seleccionar la opción "Estadísticas" y sub opción "Estudiante".</p>
                    <br>
                    <img src="https://i.imgur.com/3jtw2QL.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Luego del listado de estudiantes se debe seleccionar el estudiante del cuál se desea ver dibujo, y se verán las estadísticas de las actividades y los dibujos de actividad de Lenguaje.</p>
                    <br>
                    <p><strong>Nota:</strong><i> Considerar que solo se verán los dibujos del mes en curso.</i></p>
                </div>
            </div>
        </div>
        <!-- 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Ver estadísticas mensuales de un estudiante
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Para ver las estadísticas de los estudiantes, se debe acceder inicialmente al panel izquierdo.</p>
                    <br>
                    <img src="https://i.imgur.com/88Xjpek.png" class="rounded mx-auto d-block">
                    <p>Luego seleccionar la opción "Estadísticas" y sub opción "Estudiante".</p>
                    <br>
                    <img src="https://i.imgur.com/3jtw2QL.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Luego del listado de estudiantes se debe seleccionar el estudiante del cuál se desea estadísticas, y se verán las estadísticas de las actividades y los dibujos de actividad de Lenguaje.</p>
                    <br>
                    <p><strong>Nota:</strong><i> Considerar que solo se verán estadísticas del mes en curso.</i></p>
                </div>
            </div>
        </div>
        <!-- 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Ver insignias disponibles en Educoding
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Para ver las insignias disponibles en la plataforma, se debe acceder inicialmente al panel izquierdo.</p>
                    <br>
                    <img src="https://i.imgur.com/88Xjpek.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Luego debemos ingresar a "Insignias-> Ver insignias disponibles".</p>
                    <br>
                    <img src="https://i.imgur.com/fvXPiqb.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Dentro de esta opción se pueden ver todas las isnigias disponibles en la plataforma Educoding, que posteriormente, se pueden enviar como recompensa a los estudiantes por haber completado actividades.</p>
                </div>
            </div>
        </div>
        <!-- 5 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Enviar insignia a estudiante
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Para enviar insignias a los estudiantes, se debe acceder inicialmente al panel izquierdo.</p>
                    <br>
                    <img src="https://i.imgur.com/88Xjpek.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Luego debemos ingresar a "Insignias-> Enviar insignia".</p>
                    <br>
                    <img src="https://i.imgur.com/fvXPiqb.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Dentro de esta opción se pueden ver el listado de estudiantes y sus insignias asignadas. En caso de querer enviarle una insignia, se debe seleccionar una que ya no tenga asignada.</p>
                </div>
            </div>
        </div>
        <!-- 6 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Ver respuestas específicas de estudiantes
                </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Para ver las respuestas específicas de los estudiantes por actividad, se debe ingresar al panel inferior derecho del dashboard principal y seleccionar una de las actividades de la lista.</p>
                    <br>
                    <img src="https://i.imgur.com/lWJX4yi.png" class="rounded mx-auto d-block">
                </div>
            </div>
        </div>
        <!-- 7 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSeven">
                <button class="accordion-button collapsed bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    Ver cursos disponibles en la plataforma
                </button>
            </h2>
            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Para ver los cursos que se encuentran registrados en la plataforma, se debe acceder inicialmente al panel izquierdo.</p>
                    <br>
                    <img src="https://i.imgur.com/88Xjpek.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Luego se debe elegir la opción "Cursos" y la sub opción "Ver cursos".</p>
                    <br>
                    <img src="https://i.imgur.com/jVCk0ne.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Dentro se podrá ver todos los cursos que están disponibles en la plataforma, los cuales se pueden registrar para un colegio específico en la plataforma.</p>
                </div>
            </div>
        </div>
        <!-- 8 -->
        <!--<div class="accordion-item">
            <h2 class="accordion-header" id="headingEight">
                <button class="accordion-button collapsed bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                    Registrar curso en la plataforma
                </button>
            </h2>
            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Para registrar un curso en la plataforma, se debe acceder inicialmente al panel izquierdo.</p>
                    <br>
                    <img src="https://i.imgur.com/88Xjpek.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Luego se debe elegir la opción "Cursos" y la sub opción "Registrar curso".</p>
                    <br>
                    <img src="https://i.imgur.com/jVCk0ne.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Luego podrá registrar un curso con los datos solicitados por el formulario.</p>
                </div>
            </div>
        </div>-->
        <!-- 9 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingNine">
                <button class="accordion-button collapsed bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                    Ver estadísticas de un curso
                </button>
            </h2>
            <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Para ver las estadísticas de un curso en específico, se debe acceder inicialmente al panel izquierdo.</p>
                    <br>
                    <img src="https://i.imgur.com/88Xjpek.png" class="rounded mx-auto d-block">
                    <p>Luego seleccionar la opción "Estadísticas" y sub opción "Cursos".</p>
                    <br>
                    <img src="https://i.imgur.com/3jtw2QL.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Luego del se debe completar el formulario con el curso y colegio que se desea buscar.</p>
                    <br>
                    <p><strong>Nota:</strong><i> Considerar que solo se verán estadísticas del mes en curso.</i></p>
                </div>
            </div>
        </div>
        <!-- 10 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTen">
                <button class="accordion-button collapsed bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                    Ver estadísticas generales de la plataforma
                </button>
            </h2>
            <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Para ver las estadísticas generales de la plataforma, se debe acceder inicialmente al panel izquierdo.</p>
                    <br>
                    <img src="https://i.imgur.com/88Xjpek.png" class="rounded mx-auto d-block">
                    <p>Luego seleccionar la opción "Estadísticas" y sub opción "General diario".</p>
                    <br>
                    <img src="https://i.imgur.com/3jtw2QL.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Se puede ver el mismo resumen cuando se ingresa al botón "Dashboard" para profesores y administradores.</p>
                    <br>
                    <p><strong>Nota:</strong><i> Considerar que solo se verán estadísticas del mes en curso.</i></p>
                </div>
            </div>
        </div>
        <!-- 11 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingEleven">
                <button class="accordion-button collapsed bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                    Ver mensajes disponibles
                </button>
            </h2>
            <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Para ver los mensajes disponibles en la plataforma, se debe acceder inicialmente al panel izquierdo.</p>
                    <br>
                    <img src="https://i.imgur.com/88Xjpek.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Luego se debe seleccionar la opción "Mensajes" y la sub opción "Ver mensajes".</p>
                    <br>
                    <img src="https://i.imgur.com/XJMAwoB.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Podrá ver los mensajes disponibles, y en caso de no tener mensajes no aparecerá información.</p>
                    <br>
                    <p>También puede ver mensajes en sus notificaciones y en el panel principal al costado derecho.</p>
                    <br>
                    <img src="https://i.imgur.com/u88VlpQ.png" class="rounded mx-auto d-block">
                    <br>
                    <img src="https://i.imgur.com/6S5dmBq.png" class="rounded mx-auto d-block">
                </div>
            </div>
        </div>
        <!-- 12 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwelve">
                <button class="accordion-button collapsed bg-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                    Enviar mensajes a estudiantes
                </button>
            </h2>
            <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Para enviar mensajes en la plataforma, se debe acceder inicialmente al panel izquierdo.</p>
                    <br>
                    <img src="https://i.imgur.com/88Xjpek.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Luego se debe seleccionar la opción "Mensajes" y la sub opción "Crear mensaje".</p>
                    <br>
                    <img src="https://i.imgur.com/XJMAwoB.png" class="rounded mx-auto d-block">
                    <br>
                    <p>Debe seleccionar destinatario, título y descripción del mensaje.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endif
@endsection