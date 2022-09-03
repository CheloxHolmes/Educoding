@extends('layout')

@section('content')

<script>
    var mouse;
    var color;
    var tamaño = 5;
    var cuadrito = document.getElementById("area_de_dibujo");
    var papel = cuadrito.getContext("2d");
    var y = 150;
    var x = 150;
    var teclas = {
        MENOSTECLADO: 189,
        MASTECLADO: 187,
        MENOSNUMPAD: 109,
        MASNUMPAD: 107,
    };

    var rosita = document.getElementById("rosita");
    var azul = document.getElementById("azul");
    var negro = document.getElementById("verde");
    var rojo = document.getElementById("rojo");
    var lila = document.getElementById("lila");
    var negro = document.getElementById("amarillo");

    azul.addEventListener("click", cambiarColorAzul);
    lila.addEventListener("click", cambiarColorLila);
    rosita.addEventListener("click", cambiarColorRosita);
    rojo.addEventListener("click", cambiarColorRojo);
    amarillo.addEventListener("click", cambiarColorAmarillo);
    verde.addEventListener("click", cambiarColorVerde);

    var tamaño1 = document.getElementById("tamaño1");
    var tamaño2 = document.getElementById("tamaño2");
    var tamaño3 = document.getElementById("tamaño3");

    tamaño1.addEventListener("click", cambiarTamaño1);
    tamaño2.addEventListener("click", cambiarTamaño2);
    tamaño3.addEventListener("click", cambiarTamaño3);

    cuadrito.addEventListener("mousedown", apretarMouse);
    cuadrito.addEventListener("mouseup", soltarMouse);
    cuadrito.addEventListener("mousemove", dibujarMouse);

    cuadrito.addEventListener("touchstart", apretarTactil);
    cuadrito.addEventListener("touchend", soltarTactil);
    cuadrito.addEventListener("touchmove", dibujarTactil);

    document.addEventListener("keydown", cambiarTamaño);

    var borrar = document.getElementById("borrar");
    borrar.addEventListener("click", borrarTodo);


    function dibujarLinea(color, xinicial, yinicial, xfinal, yfinal, lienzo) {
        lienzo.beginPath();
        lienzo.strokeStyle = color;
        lienzo.lineWidth = tamaño;
        lienzo.lineCap = "round";
        lienzo.moveTo(xinicial, yinicial);
        lienzo.lineTo(xfinal, yfinal);
        lienzo.stroke();
        lienzo.closePath;
    }

    function soltarMouse(evento) {
        mouse = 0;
        x = evento.layerX;
        y = evento.layerY;
    }



    function apretarMouse(evento) {
        mouse = 1;
        dibujarLinea(color, x, y, x - 0.1, y + 0.1, papel);
        x = evento.layerX;
        y = evento.layerY;
    }

    function dibujarMouse(evento) {
        if (mouse == 1) {
            dibujarLinea(color, x, y, evento.layerX, evento.layerY, papel);

        }
        x = evento.layerX;
        y = evento.layerY;
    }

    function soltarTactil(evento) {
        var tactil = evento.touches[0];
        x = evento.offsetX;
        y = evento.offsetY;
    }

    function apretarTactil(evento) {
        evento.preventDefault();
        tactil = 1;
        x = evento.offsetX;
        y = evento.offsetY;
    }

    function dibujarTactil(evento) {
        console.log(e);
        if (tactil > 0) {
            dibujarLinea(color, x, y, X, Y, papel);

        }
        x = evento.offsetX;
        y = evento.offsetY;
    }

    function cambiarColorAzul() {
        color = "#99e6ff";
    }

    function cambiarColorLila() {
        color = "#99b3ff"
    }

    function cambiarColorRosita() {
        color = "#ff99cc";
    }

    function cambiarColorRojo() {
        color = "#ff9999"
    }

    function cambiarColorAmarillo() {
        color = "#ffff99"
    }

    function cambiarColorVerde() {
        color = "#99ff99"
    }

    function cambiarTamaño1() {
        tamaño = 5;
    }

    function cambiarTamaño2() {
        tamaño = 10;
    }

    function cambiarTamaño3() {
        tamaño = 15;
    }

    function borrarTodo() {
        tamaño = 50;
        color = "white";
    }

    function cambiarTamaño(evento) {
        var cambio_tamaño = 2;
        switch (evento.keyCode) {
            case teclas.MENOSTECLADO:
                tamaño = tamaño - cambio_tamaño;
                break;

            case teclas.MENOSNUMPAD:
                tamaño = tamaño - cambio_tamaño;
                break;

            case teclas.MASTECLADO:
                tamaño = tamaño + cambio_tamaño;
                break;

            case teclas.MASNUMPAD:
                tamaño = tamaño + cambio_tamaño;
                break;
        }

        var ancho = document.getElementById("ancho").innerHTML = ("[" + tamaño + "]")
    }
</script>

<link rel="stylesheet" href="{{asset('../assets/css/pizarra.css')}}">

<div class="container" style="margin-top:8%;margin-bottom:8%">

    <input type="button" class="rosa" id="rosita"></button>
    <input type="button" class="azul" id="azul"></button>
    <input type="button" class="verde" id="verde"></button>
    <input type="button" class="amarillo" id="amarillo"></button>
    <input type="button" class="rojo" id="rojo"></button>
    <input type="button" class="lila" id="lila"></button>

    <input type="button" class="tamaño1" id="tamaño1"></button>
    <input type="button" class="tamaño2" id="tamaño2"></button>
    <input type="button" class="tamaño3" id="tamaño3"></button>
    <input type="button" class="borrar" id="borrar" value="goma"></button>
    <canvas width="500px" height="500px" id="area_de_dibujo"></canvas>
    <p>
        Usa + y - para cambiar el ancho
        <span id="ancho">
        </span>
    </p>

</div>

@endsection
