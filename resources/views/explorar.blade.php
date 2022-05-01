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
    </script>

    <div style="position: relative;display: block;margin-left: auto;margin-right: auto;width: 80%; margin-bottom:3%;margin-top:3%;">

        <!--INGLES-->
        <img src="{{asset('assets/img/INGLES1.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 300px;height: 100px;position: inherit;top: 430px;right: -1150px" onclick="linkActividad('/actividad/ingles/1')" onpointerenter="showPreview('Escuela')" onpointerout="hidePreview()" />

        <!--HISTORIA-->
        <img src="{{asset('assets/img/HISTORIA1.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 300px;height: 100px;position: inherit;top: 230px;right: 70px" onclick="linkActividad('/actividad/historia/1')" onpointerenter="showPreview('Circo')" onpointerout="hidePreview()" />

        <!--MATEMATICAS-->
        <img src="{{asset('assets/img/MATEMATICA1.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 300px;height: 100px;position: inherit;top: 1100px;right: 160px;" onclick="linkActividad('/actividad/matematica/1')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />

        <!--TIENDA-->
        <img src="{{asset('assets/img/TIENDA.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 300px;height: 100px;position: inherit;top: 900px;right: 10px;" onclick="linkActividad('/tienda/1')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />

        <!--ARTES-->
        <img src="{{asset('assets/img/ARTES1.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 300px;height: 100px;position: inherit;top: 1100px;right: 170px;" onclick="linkActividad('/actividad/artes/1')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />

        <!--CAMBIO MAPA-->
        <img src="{{asset('assets/img/map.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 100px;height: 100px;position: inherit;top: 600px;right: -725px;" onclick="linkActividad('/actividad/artes/1')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />

        <!--CIUDAD-->
        <img style="border-radius:20px;" src="{{asset('assets/img/mapa4.png')}}">


        <h4 id="opcionUsuarioPreview" style="text-align: center;"></h4>
    </div>

    <div style="position: relative;display: block;margin-left: auto;margin-right: auto;width: 80%; ">

        <div class="row" style="margin-bottom:3%;">
            <div class="col-lg-6">
                <button type="button" class="btn btn-warning btn-block" style="background-color: rgb(255,193,7);pointer-events: none;">Puntos: 30</button>
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-info btn-block" style="pointer-events: none;">Módulos completados: 0/3</button>
            </div>
        </div>

    </div>
</body>




@endsection