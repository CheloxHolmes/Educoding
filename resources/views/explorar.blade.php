@extends('layout')

@section('content')

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

    <div style="position: relative;display: block;margin-left: auto;margin-right: auto;width: 80%; margin-bottom:3%;margin-top:3%;">

        <!--INGLES-->
        <img src="{{asset('assets/img/INGLES1.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 300px;height: 100px;position: inherit;top: 430px;right: -1150px" onclick="linkActividad('/actividad/ingles')" onpointerenter="showPreview('Escuela')" onpointerout="hidePreview()" />

        <!--HISTORIA-->
        <img src="{{asset('assets/img/HISTORIA1.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 300px;height: 100px;position: inherit;top: 230px;right: 70px" onclick="linkActividad('/actividad/historia')" onpointerenter="showPreview('Circo')" onpointerout="hidePreview()" />

        <!--MATEMATICAS-->
        <img src="{{asset('assets/img/MATEMATICA1.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 300px;height: 100px;position: inherit;top: 1100px;right: 160px;" onclick="linkActividad('/actividad/matematicas')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />

        <!--TIENDA-->
        <img src="{{asset('assets/img/TIENDA.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 300px;height: 100px;position: inherit;top: 900px;right: 10px;" onclick="linkActividad('/tienda/1')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />

        <!--ARTES-->
        <img src="{{asset('assets/img/ARTES1.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 300px;height: 100px;position: inherit;top: 1100px;right: 170px;" onclick="linkActividad('/actividad/artes')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />

        <!--CAMBIO MAPA-->
        <img src="{{asset('assets/img/map.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 100px;height: 100px;position: inherit;top: 600px;right: -725px;" onclick="linkActividad('/actividad/artes')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />

        <!--CIUDAD-->
        <img style="border-radius:20px;" src="{{asset('assets/img/mapa4.png')}}">


        <h4 id="opcionUsuarioPreview" style="text-align: center;"></h4>
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
</body>




@endsection