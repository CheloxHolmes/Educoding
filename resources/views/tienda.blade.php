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

        function linkComprar(ruta) {
            window.location.href = ruta;
        }
    </script>

    <div class="row justify-content-center" style="margin-top:8%;">
        <div class="col-xl-7 col-lg-8">
            <div class="section-tittle text-center mb-55">
                <h2>Tienda</h2>
            </div>
        </div>
    </div>

    @if(Session::has('error'))
    <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('error')}}</strong></p><br>
    @endif
    @if(Session::has('success'))
    <p style="text-align:center;"><strong class="col-md-6" style="color:green;">{{Session::get('success')}}</strong></p><br>
    @endif

    <div style="position: relative;display: block;margin-left: auto;margin-right: auto;width: 80%; margin-bottom:3%;">

        <input type="hidden" id="items_comprados" value="@foreach($items as $item){{$item->id_elemento}},@endforeach">

        <script>
            window.addEventListener("load", function() {
                console.log("'Todos los recursos terminaron de cargar!");
                let comprados = $("#items_comprados").val().split(",");
                console.log(comprados);

                for (var i=0; i<comprados.length-1; i++) {
                    console.log("#img-tag-" + comprados[i]);

                    $("#img-tag-" + comprados[i]).css("display", "none");
                }
            });
        </script>


        <!--PELOTA-->
        <img src="{{asset('assets/img/pelota.png')}}" id="img-tag-400" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 500px;right: -181px;" onclick="linkComprar('/tienda/comprar/400')" onpointerenter="showPreview('Pelota: $50 uLearnet coins')" onpointerout="hidePreview()" />

        <!--RELOJ-->
        <img src="{{asset('assets/img/reloj.png')}}" id="img-tag-401" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 500px;right: -152px;" onclick="linkComprar('/tienda/comprar/401')" onpointerenter="showPreview('Reloj')" onpointerout="hidePreview()" />

        <!--ALARMA-->
        <img src="{{asset('assets/img/alarma.png')}}" id="img-tag-402" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 500px;right: -214px;" onclick="linkComprar('/tienda/comprar/402')" onpointerenter="showPreview('Alarma')" onpointerout="hidePreview()" />

        <!--ZAPATO-->
        <img src="{{asset('assets/img/zapato.png')}}" id="img-tag-403" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 350px;right: 370px;" onclick="linkComprar('/tienda/comprar/403')" onpointerenter="showPreview('Zapato')" onpointerout="hidePreview()" />

        <!--wallet-->
        <img src="{{asset('assets/img/wallet.png')}}" id="img-tag-404" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 350px;right: 404px;" onclick="linkComprar('/tienda/comprar/404')" onpointerenter="showPreview('Billetera')" onpointerout="hidePreview()" />

        <!--RAQUETA-->
        <img src="{{asset('assets/img/raquet.png')}}" id="img-tag-409" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 500px;right: -829px;" onclick="linkComprar('/tienda/comprar/409')" onpointerenter="showPreview('Raqueta')" onpointerout="hidePreview()" />

        <!--BOX-->
        <img src="{{asset('assets/img/box.png')}}" id="img-tag-405" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 350px;right: -130px;" onclick="linkComprar('/tienda/comprar/405')" onpointerenter="showPreview('Guantes')" onpointerout="hidePreview()" />

        <!--BATE-->
        <img src="{{asset('assets/img/bate.png')}}" id="img-tag-411" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 500px;right: -780px;" onclick="linkComprar('/tienda/comprar/411')" onpointerenter="showPreview('Bate')" onpointerout="hidePreview()" />

        <!--MANCUERNA-->
        <img src="{{asset('assets/img/mancuera.png')}}" id="img-tag-410" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 500px;right: -420px;" onclick="linkComprar('/tienda/comprar/410')" onpointerenter="showPreview('Mancuerna')" onpointerout="hidePreview()" />

        <!--botella-->
        <img src="{{asset('assets/img/botellita.png')}}" id="img-tag-406" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 200px;right: 660px;" onclick="linkComprar('/tienda/comprar/406')" onpointerenter="showPreview('Botella')" onpointerout="hidePreview()" />

        <!--calculadora-->
        <img src="{{asset('assets/img/calculadora.png')}}" id="img-tag-407" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 200px;right: 600px;" onclick="linkComprar('/tienda/comprar/407')" onpointerenter="showPreview('Calculadora')" onpointerout="hidePreview()" />

        <!--ticket-->
        <img src="{{asset('assets/img/ticket.png')}}" id="img-tag-408" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 200px;right: 540px;" onclick="linkComprar('/tienda/comprar/408')" onpointerenter="showPreview('Ticket')" onpointerout="hidePreview()" />

        <!--camion-->
        <img src="{{asset('assets/img/camion.png')}}" id="img-tag-412" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 350px;right: 200px;" onclick="linkComprar('/tienda/comprar/412')" onpointerenter="showPreview('Camion')" onpointerout="hidePreview()" />

        <!--OSITO-->
        <img src="{{asset('assets/img/osito.png')}}" id="img-tag-413" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 350px;right: 140px;" onclick="linkComprar('/tienda/comprar/413')" onpointerenter="showPreview('Osito')" onpointerout="hidePreview()" />

        <!--PUPPY-->
        <img src="{{asset('assets/img/puppy.png')}}" id="img-tag-414" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 350px;right: 80px;" onclick="linkComprar('/tienda/comprar/414')" onpointerenter="showPreview('Puppy')" onpointerout="hidePreview()" />

        <!--TROFEO-->
        <img src="{{asset('assets/img/trofeo.png')}}" id="img-tag-415" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 350px;right: 80px;" onclick="linkComprar('/tienda/comprar/415')" onpointerenter="showPreview('Trofeo')" onpointerout="hidePreview()" />

        <!--VARITA-->
        <img src="{{asset('assets/img/varita.png')}}" id="img-tag-416" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 350px;right: 80px;" onclick="linkComprar('/tienda/comprar/416')" onpointerenter="showPreview('Varita')" onpointerout="hidePreview()" />

        <!--SOMBRERO-->
        <img src="{{asset('assets/img/sombrero.png')}}" id="img-tag-417" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: inherit;top: 350px;right: 80px;" onclick="linkComprar('/tienda/comprar/417')" onpointerenter="showPreview('Sombrero')" onpointerout="hidePreview()" />

        <!--ESTANTE1-->
        <img style="border-radius:20px;" src="{{asset('assets/img/FondoTienda.jpg')}}" width="100%">

        <h4 id="opcionUsuarioPreview" style="text-align: center;"></h4>
    </div>

    <div style="position: relative;display: block;margin-left: auto;margin-right: auto;width: 80%; ">

        <audio controls autoplay style="border:1px solid black;margin:3%;">
            <source src="{{asset('mp3/elevator.mp3')}}" type="audio/mpeg">
        </audio>

        <div class="row" style="margin-bottom:3%;">
            <div class="col-lg-6">
                @foreach($coins as $coin)
                <button type="button" class="btn btn-warning btn-block" style="background-color: rgb(255,193,7);pointer-events: none;">uLearnet coins disponibles: {{$coin}}</button>
                @endforeach
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-info btn-block" style="pointer-events: none;">Módulos completados: 0/3</button>
            </div>
        </div>

    </div>
</body>


@endsection