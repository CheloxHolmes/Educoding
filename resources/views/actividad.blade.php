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

        console.log("loadCurrentPageContent(currentPage);");

        $("#topImageImg").attr('src', "");
        $("#inputAlternativesAnswer").html("<option value=''>Seleccionar...</option>");

        let paginaEnUso = libros[currentBook].pages[pageN];

        paginaEnUso.tipo = "texto";

        if (paginaEnUso.justificacion) {
            if (paginaEnUso.justificacion.length > 0) {

                if (paginaEnUso.justificacion.includes("|")) {
                    paginaEnUso.tipo = "alternativas";

                    let alternativas = paginaEnUso.justificacion.split("|");
                    for (var a=0; a<alternativas.length; a++) {
                        $("#inputAlternativesAnswer").append("<option>"+alternativas[a]+"</option>");

                        if (alternativas[a].includes("*")) {
                            paginaEnUso.respuesta = alternativas[a];
                            libros[currentBook].respuesta = alternativas[a];
                        }
                    }
                }
                else {
                    paginaEnUso.tipo = "pregunta";
                    paginaEnUso.respuesta = paginaEnUso.justificacion;
                    libros[currentBook].respuesta = paginaEnUso.justificacion;
                }

            }
        }

        paginaEnUso.texto = paginaEnUso.pregunta;
        //paginaEnUso.imagen = paginaEnUso.imagen_idimagen;

        if (paginaEnUso.tipo == "texto") {
            $("#topImageImg").attr('src', paginaEnUso.imagen);
            $("#leftTextP").html(paginaEnUso.texto);
        }
        if (paginaEnUso.tipo == "adjunta") {
            $("#topImageImg").attr('src', paginaEnUso.imagen);
            $("#leftTextP").html(paginaEnUso.texto);
        }
        if (paginaEnUso.tipo == "pregunta") {
            $("#topImageImg").attr('src', paginaEnUso.imagen);
            $("#leftTextP").html(paginaEnUso.texto);
            $("#inputSimpleAnswer").css("display", "block");
            $("#submitSimpleAnswer").css("display", "block");
        }
        if (paginaEnUso.tipo == "alternativas") {
            $("#topImageImg").attr('src', paginaEnUso.imagen);
            $("#leftTextP").html(paginaEnUso.texto);
            $("#inputAlternativesAnswer").css("display", "block");
            $("#submitAlternativesAnswer").css("display", "block");
        }

        if (pageN < libros[currentBook].pages.length - 1) {
            $("#arrowPagesImg").css("display", "block");
        } else {
            $("#arrowPagesImg").css("display", "none");
        }
    }

    function linkBook(num) {

        if (num > libros.length) {
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

                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '/actividad/'+libros[currentBook].id+'/sumar',
                    data: {
                        __id: "0"
                    },
                    success: function(data) {
                        alert("PUNTOS SUMADOS");

                        /*let modulosActual = parseInt($("#modulosValue").html().split(":")[1].split("/")[0]);
                        modulosActual = modulosActual + 1;
                        $("#modulosValue").html("Módulos: " + modulosActual + "/30");*/

                        let coinsActual = parseInt($("#coinsValue").html().split(":")[1].split("/")[0]);
                        coinsActual = coinsActual + 3;
                        $("#coinsValue").html("uLearnet Coins: " + coinsActual + "/30");
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert("Error al sumar coins, arregla eso MARCELO, me desespero");
                    }
                });

            } else {
                alert("¡Respuesta incorrecta!");
            }
            closeBook();
        } else {
            alert("Debes dar una respuesta!");
        }
    }

    function answerAlternativesPage() {
        if ($("#inputAlternativesAnswer").val() != "") {
            if ($("#inputAlternativesAnswer").val() == libros[currentBook].respuesta) {
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
        $("#inputAlternativesAnswer").css("display", "none");
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
            
            <!--<select id="inputAlternativesAnswer" class="form-control" style="display: none;position: absolute;top: 339px;right: 293px;width: 213px;font-size: 20px;height: 53px;background: url();border: 1px solid;font-family: 'Brush Script MT', cursive;">
                <option value="">Seleccionar...</option>
            </select>-->
        </div>

        <div id="finisContent" style="display:none">
            <img id="topImageImg" src="{{asset('finish.png')}}" class="inner-image" style="display: block;position: absolute;top: 106px;right: 360px;" />
            <p id="finishTextP" style="font-family: 'Brush Script MT', cursive;display: block;position: absolute;top: 236px;right: 347px;width: 298px;font-size: 34px;">Actividad completada</p>
            <img id="finishEmoji" src="{{asset('cool.png')}}" class="inner-image" style="display:block;position: absolute;top: 379px;right: 483px;" />
            <img id="finishClose" src="{{asset('close.png')}}" class="inner-image" style="cursor:pointer;display:block;position: absolute;top: 453px;right: 368px;" onclick="closeFinish()" />
        </div>


    </div>

    <div style="margin-top:3%;margin-bottom:3%;text-align:center;">
        <h1>Actividad {{$actividad->id}} {{$actividad->nombre}}</h1>
    </div>
</div>


<button class="open-button" onclick="openForm()">Estado</button>

<div class="chat-popup" id="myForm">
    <form action="/action_page.php" class="form-container">
        @if(Auth::user()->username==NULL)
        <h2 style="text-align: center;">{{ Auth::user()->nombres }}</h2>
        <div style="margin-bottom:2%;">
            <img src="{{asset('assets/img/avatar/'.$avatar)}}" style="width: 100%;height:100%;">
        </div>
        @endif
        <button id="modulosValue" type="button" class="btn btn-lg btn-primary" disabled>Módulos: {{ Auth::user()->ModulosCompletados }}/30</button>
        <button id="coinsValue" type="button" class="btn btn-lg btn-primary" disabled>uLearnet Coins: {{ $coins }}</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Cerrar</button>
    </form>
</div>

@endsection