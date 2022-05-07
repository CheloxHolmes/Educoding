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

    <div class="row justify-content-center" style="margin-top:10%;">
        <div class="col-xl-7 col-lg-8">
            <div class="section-tittle text-center mb-55">
                <h2>Tienda</h2>
            </div>
        </div>
    </div>

    <div style="position: relative;display: block;margin-left: auto;margin-right: auto;width: 80%; margin-bottom:3%;">

        <!--PELOTA-->
        <img src="{{asset('assets/img/pelota.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 150px;height: 150px;position: inherit;top: 380px;right: -150px;" onclick="linkActividad('/actividad/ingles/1')" onpointerenter="showPreview('Escuela')" onpointerout="hidePreview()" />

        <!--RAQUETA-->
        <img src="{{asset('assets/img/raquet.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 150px;height: 150px;position: inherit;top: 380px;right: -1060px;" onclick="linkActividad('/actividad/historia/1')" onpointerenter="showPreview('Circo')" onpointerout="hidePreview()" />

        <!--RELOJ-->
        <img src="{{asset('assets/img/reloj.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 150px;height: 150px;position: inherit;top: 400px;right: -60px;" onclick="linkActividad('/actividad/matematica/1')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />

        <!--ALARMA-->
        <img src="{{asset('assets/img/alarma.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 150px;height: 150px;position: inherit;top: 400px;right: 30px;" onclick="linkActividad('/tienda/1')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />

        <!--BOX-->
        <img src="{{asset('assets/img/box.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 150px;height: 150px;position: inherit;top: 230px;right: 140px;" onclick="linkActividad('/actividad/artes/1')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />

        <!--BATE-->
        <img src="{{asset('assets/img/bate.png')}}" alt="" class="inner-image" style="cursor:pointer;width: 150px;height: 150px;position: inherit;top: 540px;right: -450px;" onclick="linkActividad('/actividad/artes/1')" onpointerenter="showPreview('Inicio')" onpointerout="hidePreview()" />

        <!--ESTANTE1-->
        <img style="border-radius:20px;" src="{{asset('assets/img/FondoTienda.jpg')}}" width="100%">

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