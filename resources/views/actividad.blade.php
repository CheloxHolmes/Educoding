@extends('layout')

@section('content')

<input id="actividadObj" value='{{$actividadString}}' />
<input id="booksObjArray" value='{{$booksArrayString}}' />
<input id="userObj" value='{{$usuario}}' />

<script>
    let actividad = undefined;
    let libros = undefined;
    let usuario = undefined;
    window.addEventListener("load", function() {
        actividad = JSON.parse($("#actividadObj").val());
        console.log("ACTIVIDAD:", actividad);
        libros = JSON.parse($("#booksObjArray").val());
        console.log("LIBROS:", libros);
        usuario = JSON.parse($("#userObj").val());
        console.log("USUARIOS:", usuario);
    });
    let currentBook = -1;
    let currentPage = -1;

    function loadCurrentPageContent(pageN) {
        if (libros[currentBook].pages[pageN].tipo == "texto") {
            $("#topImageImg").attr('src', libros[currentBook].pages[pageN].imagen);
            $("#leftTextP").html(libros[currentBook].pages[pageN].texto);
        }
        if (libros[currentBook].pages[pageN].tipo == "adjunta") {
            $("#topImageImg").attr('src', libros[currentBook].pages[pageN].imagen);
            $("#leftTextP").html(libros[currentBook].pages[pageN].texto);
        }
        if (libros[currentBook].pages[pageN].tipo == "pregunta") {
            $("#topImageImg").attr('src', libros[currentBook].pages[pageN].imagen);
            $("#leftTextP").html(libros[currentBook].pages[pageN].texto);
            $("#inputSimpleAnswer").css("display", "block");
            $("#submitSimpleAnswer").css("display", "block");
        }
        if (libros[currentBook].pages[pageN].tipo == "alternativas") {
            $("#topImageImg").attr('src', libros[currentBook].pages[pageN].imagen);
            $("#leftTextP").html(libros[currentBook].pages[pageN].texto);

            $("#submitAlternativesAnswer").css("display", "block");
        }

        if (pageN < libros[currentBook].pages.length - 1) {
            $("#arrowPagesImg").css("display", "block");
        } else {
            $("#arrowPagesImg").css("display", "none");
        }
    }

    function linkBook(num) {

        if (num >= libros.length) {
            alert("Libro no encontrado");
            return false;
        }

        currentPage = 0;
        currentBook = num - 1;
        $("#pagesImg").css("display", "block");
        $("#closePagesImg").css("display", "block");
        $("#pageContent").css("display", "block");
        loadCurrentPageContent(currentPage);
    }

    function nextPage() {
        ++currentPage;
        loadCurrentPageContent(currentPage);
    }

    function answerPage() {
        if ($("#inputSimpleAnswer").val() != "") {
            if ($("#inputSimpleAnswer").val() == libros[currentBook].respuesta) {
                /*sumar puntos estudiante*/
                alert("¡Respuesta correcta!");
                $("#finisContent").css("display", "block");
            } else {
                alert("¡Respuesta incorrecta!");
            }
            closeBook();
        } else {
            alert("Debes dar una respuesta!");
        }
    }

    function closeBook() {
        $("#pagesImg").css("display", "none");
        $("#closePagesImg").css("display", "none");
        $("#pageContent").css("display", "none");
        $("#submitSimpleAnswer").css("display", "none");
        $("#submitAlternativesAnswer").css("display", "none");
        $("#inputSimpleAnswer").css("display", "none");
        $("#inputSimpleAnswer").val("");
        currentPage = -1;
        currentBook = -1;
    }

    function closeFinish() {
        $("#finisContent").css("display", "none");
    }

    function Scenario1() {
        closeBook();
        $("#booksContainer1").css("display", "block");
        $("#prevScenarioImg").css("display", "none");
        $("#nextScenarioImg").css("display", "block");
        $("#booksContainer2").css("display", "none");
        $("#background").attr("src", "https://i.imgur.com/JOPNIdE.jpg");
    }

    function Scenario2() {
        closeBook();
        $("#booksContainer1").css("display", "none");
        $("#prevScenarioImg").css("display", "block");
        $("#nextScenarioImg").css("display", "none");
        $("#background").attr("src", "https://i.imgur.com/XRsBB5h.jpg");
        $("#booksContainer2").css("display", "block");
    }

    /*Función para barra de estados*/
    
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }

</script>

<div class="container" style="margin-top:8%;margin-bottom:10%">

    <div style="position: relative;display: block;">

        <!--ESCENARIO 1-->
        <div id="booksContainer1">
            <img id="bookLink-1" src="{{asset('magicBook0.png')}}" class="inner-image" style="cursor:pointer;position: absolute;top: 355px;right: 545px;" onclick="linkBook(1)" />
            <img id="bookLink-2" src="{{asset('magicBook0.png')}}" class="inner-image" style="cursor:pointer;position: absolute;top: 390px;right: 780px;" onclick="linkBook(2)" />
            <img id="bookLink-3" src="{{asset('magicBook0.png')}}" class="inner-image" style="cursor:pointer;position: absolute;top: 555px;right: 545px;" onclick="linkBook(3)" />
        </div>

        <div id="booksContainer2" style="display:none;">
            <img id="bookLink-4" src="{{asset('magicBook0.png')}}" class="inner-image" style="cursor:pointer;position: absolute;top: 525px;right: 100px;" onclick="linkBook(4)" />
            <img id="bookLink-5" src="{{asset('magicBook0.png')}}" class="inner-image" style="cursor:pointer;position: absolute;top: 470px;right: 680px;" onclick="linkBook(5)" />
            <img id="bookLink-6" src="{{asset('magicBook0.png')}}" class="inner-image" style="cursor:pointer;position: absolute;top: 400px;right: 220px;" onclick="linkBook(6)" />
        </div>

        <!--CASA-->
        <img id="background" style="border-radius:20px;" src="{{asset('casa1.jpg')}}">

        <!--
        <img id="background2" style="display: none;border-radius:20px;position: absolute;top: 0px;" src="{{asset('casa2.jpg')}}">-->

        <img id="pagesImg" src="{{asset('pages.png')}}" class="inner-image" style="display:none;position: absolute;top: 55px;right: 130px" />
        <img id="closePagesImg" src="{{asset('close.png')}}" class="inner-image" style="cursor:pointer;display:none;position: absolute;top: 529px;right: 799px;" onclick="closeBook()" />

        <img id="prevScenarioImg" src="{{asset('arrow-left.png')}}" class="inner-image" style="cursor:pointer;display:none;position: absolute;top: 296px;right: 1084px;" onclick="Scenario1()" />

        <img id="nextScenarioImg" src="{{asset('arrow.png')}}" class="inner-image" style="cursor:pointer;display:block;position: absolute;top: 296px;right: -98px;" onclick="Scenario2()" />

        <div id="pageContent">
            <img id="topImageImg" src="" class="inner-image" style="display:block;position: absolute;top: 148px;right: 625px;width: 130px;" />
            <p id="leftTextP" style="font-family: 'Brush Script MT', cursive;display: block;position: absolute;top: 305px;    right: 530px;width: 298px;font-size: 35px;"></p>
            <img id="arrowPagesImg" src="{{asset('arrow.png')}}" class="inner-image" style="cursor:pointer;display:none;position: absolute;top: 495px;right: 213px;" onclick="nextPage()" />
            <img id="submitSimpleAnswer" src="{{asset('play.png')}}" class="inner-image" style="cursor:pointer;display:none;position: absolute;top: 333px;right: 213px;" onclick="answerPage()" />
            <img id="submitAlternativesAnswer" src="{{asset('play.png')}}" class="inner-image" style="cursor:pointer;display:none;position: absolute;top: 333px;right: 213px;" onclick="answerAlternativesPage()" />
            <input id="inputSimpleAnswer" class="form-control" style="display: none;position: absolute;top: 339px;right: 293px;width: 213px;font-size: 20px;height: 53px;background: url();border: 1px solid;font-family: 'Brush Script MT', cursive;" />
        </div>

        <div id="finisContent" style="display:none">
            <img id="topImageImg" src="{{asset('finish.png')}}" class="inner-image" style="display: block;position: absolute;top: 106px;right: 360px;" />
            <p id="finishTextP" style="font-family: 'Brush Script MT', cursive;display: block;position: absolute;top: 236px;right: 347px;width: 298px;font-size: 34px;">Actividad completada</p>
            <img id="finishEmoji" src="{{asset('cool.png')}}" class="inner-image" style="display:block;position: absolute;top: 379px;right: 483px;" />
            <img id="finishClose" src="{{asset('close.png')}}" class="inner-image" style="cursor:pointer;display:block;position: absolute;top: 453px;right: 368px;" onclick="closeFinish()" />
        </div>


    </div>

    <div style="margin-top:3%;margin-bottom:3%;text-align:center;">
        <h1>Actividad {{$actividad->codigo}} {{$actividad->nombre}}</h1>
    </div>
    <!--<div class="progress" style="height:20px;">
        <div class="progress-bar bg-success" role="progressbar" style="width: 25%; font-size:15px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
    </div>-->

    <!--
    <div class="accordion" id="accordionExample">
        <!-- MODULO 1 --
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="background-color: rgb(62, 137, 207);">
                        Introducción 1/10
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body" style="padding:4%;">
                    <div style="text-align:center;margin-bottom:2%;">
                        <h1>La familia Perez</h1>
                    </div>
                    ¡Oh no!, la casa de la familia Perez ha caído bajo el hechizo del mago Extrañín. Al entrar a la casa ves que todo está convertido en figuras plásticas y de madera, desde los muebles, la comida, e incluso hasta la misma familia Perez.
                    <br>
                    <div style="margin-top:4%;margin-bottom:4%;">
                        <img src="{{asset('assets/img/PerezHouse.jpg')}}" class="rounded mx-auto d-block" width="60%" height="60%">
                    </div>
                    <br>
                    Al llegar a la habitación principal ves que hay un libro gigante llamado "Desafío para revertir hechizo", por lo que pareciera ser una solución que ha dejado el mago para volver a la normalidad.
                    <br>
                    <div style="margin-top:4%;margin-bottom:4%;">
                        <img src="{{asset('assets/img/libroSuelo.jpg')}}" class="rounded mx-auto d-block" width="60%" height="60%">
                    </div>
                    ¿Por que no intentamos resolver el desafío para ayudar a la familia Perez y al pueblo de Educoding?
                    <hr>
                    <h3><strong>Responder pregunta:</strong></h3>
                    <br>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="No requiere respuesta" aria-label="Recipient's username" aria-describedby="button-addon2" style="height:50px; font-size:15px;" disabled>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2" style="background-color: rgb(62, 137, 207);">Completar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODULO 2 --
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background-color: rgb(62, 137, 207);">
                        ¿Cuantas manzanas hay en la canasta? 2/10
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body" style="padding:4%;">
                    <div style="text-align:center;margin-bottom:2%;">
                        <h1>¿Cuantas manzanas hay en la canasta?</h1>
                    </div>
                    Al abrir el libro ves que las primeras páginas se encuentran en blanco. Sin embargo, al avanzar puedes notar que hay una imagen que está animada, pareciera ser una cocina que contiene muchas frutas, verduras, quesos y muchos tipos de jamón.
                    <br>
                    <div style="margin-top:4%;margin-bottom:4%;">
                        <img src="{{asset('assets/img/cocina.webp')}}" class="rounded mx-auto d-block" width="60%" height="60%">
                    </div>
                    <br>
                    Sin querer tocas la imagen, y por arte de magia apareces dentro de la cocina que viste en la imagen. Al entrar ves que hay una canasta con marcas de pintura mal hechas diciendo "Aquí" con una flecha apuntandole.
                    <br>
                    <br>
                    Junto a la canasta hay una nota con un lapiz que dice "Las <strong>manzanas</strong> son dulces, jugosas y brillosas. Si cuidamos el medio ambiente podremos seguir teniendo más de ellas. <strong>¿Cuantas quedan en la caja?</strong>"
                    <br>
                    <div style="margin-top:4%;margin-bottom:4%;">
                        <img src="{{asset('assets/img/MA1M.png')}}" class="rounded mx-auto d-block" width="60%" height="60%">
                    </div>
                    <hr>
                    <h3><strong>Responder pregunta:</strong></h3>
                    <br>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="¿Cuantas manzanas podemos ver en la canasta?" aria-label="Recipient's username" aria-describedby="button-addon2" style="height:50px; font-size:15px;">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2" style="background-color: rgb(62, 137, 207);">Completar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODULO 3 --
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background-color: rgb(62, 137, 207);">
                        La habitación de la hija 3/10
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body" style="padding:4%;">
                    Al completar con éxito el primer desafío de las frutas, decides seguir explorando la casa de los Perez. A continuación tomas el pasillo que conecta con la cocina y entras por la primera habitación.
                    <br>
                    <br>
                    Al entrar ves que hay una habitación con juguetes, ositos de peluche y una casa de muñeca. Además ves que hay un diario de vida que en la portada dice "Mi querido diario".
                    <div style="margin-top:4%;margin-bottom:4%;">
                        <img src="{{asset('assets/img/DiarioLily.webp')}}" class="rounded mx-auto d-block" width="50%" height="50%">
                    </div>
                    <br>
                    ¿Será este el diario de vida de Lily, la hija de los Perez? Al abrir el diario ves que hay una nota con un lapiz y esta dice:
                    <br>
                    <br>
                    <strong>Desafío 2:</strong> Mira a tu al rededor. ¿Cuanto nos da la suma de los ositos de peluche, más la muñeca, menos la casa de muñecas?
                    <div style="margin-top:4%;margin-bottom:4%;">
                        <img src="{{asset('assets/img/HabitacionLily.png')}}" class="rounded mx-auto d-block" width="50%" height="50%">
                    </div>
                    <hr>
                    <h3><strong>Responder pregunta:</strong></h3>
                    <br>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="¿Cuál es el total de la operación?" aria-label="Recipient's username" aria-describedby="button-addon2" style="height:50px; font-size:15px;">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2" style="background-color: rgb(62, 137, 207);">Completar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODULO 4 --
        <div class="card">
            <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree" style="background-color: rgb(62, 137, 207);">
                        El cuadro familiar 4/10
                    </button>
                </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body" style="padding:4%;">
                    ¡Genial!, ya has completado dos de los desafíos del mago Extrañín, cada vez estamos más cerca de restablecer a la normalidad la casa de los Perez.
                </div>
            </div>
        </div>
        <!-- MODULO 5 --
        <div class="card">
            <div class="card-header" id="headingFive">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree" style="background-color: rgb(62, 137, 207);">
                        La habitación basura 5/10
                    </button>
                </h2>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                <div class="card-body" style="padding:4%;">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <!-- MODULO 6 --
        <div class="card">
            <div class="card-header" id="headingSix">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree" style="background-color: rgb(62, 137, 207);">
                        El jardín seco 6/10
                    </button>
                </h2>
            </div>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                <div class="card-body" style="padding:4%;">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <!-- MODULO 7 --
        <div class="card">
            <div class="card-header" id="headingSeven">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseThree" style="background-color: rgb(62, 137, 207);">
                        Volviendo a la normalidad 7/10
                    </button>
                </h2>
            </div>
            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                <div class="card-body" style="padding:4%;">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <!-- MODULO 8 --
        <div class="card">
            <div class="card-header" id="headingEight">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseThree" style="background-color: rgb(62, 137, 207);">
                        Resumen 8/10
                    </button>
                </h2>
            </div>
            <div id="collapseEight" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body" style="padding:4%;">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <!-- MODULO 9 -->
    <!--<div class="card">
            <div class="card-header" id="headingNine">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseThree" style="background-color: rgb(62, 137, 207);">
                        Collapsible Group Item 9/10
                    </button>
                </h2>
            </div>
            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                <div class="card-body" style="padding:4%;">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>-->
    <!-- MODULO 10 -->
    <!--<div class="card">
            <div class="card-header" id="headingTen">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseThree" style="background-color: rgb(62, 137, 207);">
                        Resumen 10/10
                    </button>
                </h2>
            </div>
            <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                <div class="card-body" style="padding:4%;">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>--
    </div>
    -->
</div>


<button class="open-button" onclick="openForm()">Estado</button>

<div class="chat-popup" id="myForm">
    <form action="/action_page.php" class="form-container">
        @if(Auth::user()->username==NULL)
        <h2 style="text-align: center;">{{ Auth::user()->name }}</h2>
        <div style="margin-bottom:2%;">
            <img src="{{asset('assets/img/avatar/'.Auth::user()->avatar)}}" style="width: 100%;height:100%;">
        </div>
        @endif
        <button type="button" class="btn btn-lg btn-primary" disabled>Módulos: {{ Auth::user()->ModulosCompletados }}/30</button>
        <button type="button" class="btn btn-lg btn-primary" disabled>uNearlet Coins: {{ Auth::user()->coins }}</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Cerrar</button>
    </form>
</div>

@endsection