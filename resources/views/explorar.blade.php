@extends('layout')

@section('content')
@auth
<body>

    <script>
        function showPreview(casilla) {
            $("#opcionUsuarioPreview").html("Casilla: " + casilla);
        }

        function hidePreview(casilla) {
            $("#opcionUsuarioPreview").html("");
        }

        function linkActividad(ruta) {
            window.location.href = ruta;
        }
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>

    <div style="position: relative;
    margin-left: auto;
    margin-right: auto;
    width: 70%;
    margin-bottom: 3%;
    background: url({{asset('assets/img/mapa4.png')}});
    background-repeat: round;
    height: 1000px;
    margin-top: 8%;">

        <!--INGLES-->
        <img src="{{asset('assets/img/INGLES1.png')}}" alt="" class="inner-image" style="cursor: pointer;
    width: 250px;
    position: absolute;
    top: 34%;
    right: 4%;
" onclick="linkActividad('/actividad/23')" onpointerenter="showPreview('Escuela')" onpointerout="hidePreview()" />

        <!--HISTORIA-->
        <img src="{{asset('assets/img/HISTORIA1.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 250px;position: absolute;    top: 8%;
    right: 68%;" onclick="linkActividad('/actividad/21')" onpointerenter="showPreview('Circo')" onpointerout="hidePreview()" />

        <!--MATEMATICAS-->
        <img src="{{asset('assets/img/MATEMATICA1.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 250px;position: absolute;    top: 64%;
    right: 53%;" onclick="linkActividad('/actividad/22')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />

        <!--TIENDA-->
        <img src="{{asset('assets/img/TIENDA.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 250px;position: absolute;    top: 54%;
    right: 20%;" onclick="linkActividad('/tienda')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />

        <!--LENGUAJE-->
        <img src="{{asset('assets/img/LENGUAJE1.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 250px;position: absolute;    top: 68%;
    right: 10%;" onclick="linkActividad('/actividadLenguaje/24')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />

        <!--CAMBIO MAPA-->
        <!--<img src="{{asset('assets/img/map.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 100px;height: 100px;position: inherit;top: 600px;right: -725px;" onclick="linkActividad('/actividad/artes')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />-->

        <!--CIUDAD-->
        
        <!--<img style="border-radius:20px; width: 100%; height: 100%;" src="{{asset('assets/img/mapa4.png')}}">-->


        <h4 id="opcionUsuarioPreview" style="text-align: center;"></h4>
    </div>
    
    <button class="open-button" onclick="openForm()">Estado</button>

    <audio autoplay style="border:1px solid black;margin:2%;">
    <source src="{{asset('mp3/theme3.mp3')}}" type="audio/mpeg">
</audio>

    <div class="chat-popup" id="myForm">
        <form action="/action_page.php" class="form-container">
            @if(Auth::user()->username==NULL)
            <h2 style="text-align: center;">{{ Auth::user()->nombres }}</h2>
            <div style="margin-bottom:2%;">
                <img src="{{asset('assets/img/avatar/'.$avatar)}}" style="width: 100%;height:100%;">
            </div>
            @endif
            <button type="button" class="btn btn-lg btn-primary" disabled>Módulos: Módulos: {{ $modulosCompletados }}</button>
            @foreach($coins as $coin)
            <button type="button" class="btn btn-lg btn-primary" disabled>uNearlet Coins: {{ $coin }} </button>
            @endforeach
            <button type="button" class="btn cancel" onclick="closeForm()">Cerrar</button>
        </form>
    </div>
</body>



@endauth
@endsection