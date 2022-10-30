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
            if (confirm('¿Estás seguro de comprar?') == true) {
                window.location.href = ruta;
            }
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
    <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('error')}}{{Session::get('imagen')}}</strong></p><br>
    @endif
    @if(Session::has('success'))
    <p style="text-align:center;"><strong class="col-md-6" style="color:green;">{{Session::get('success')}}</strong></p><br>
    @endif
    @if(Session::has('error_image'))
    <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('error_image')}} <i class="fa fa-coins" style="color:darkgoldenrod"></i></strong></p><br>
    @endif

    <div style="position: relative;display: block;margin-left: auto;margin-right: auto;width: 80%; margin-bottom:3%;">

        <input type="hidden" id="items_comprados" value="@foreach($items as $item){{$item->id_elemento}},@endforeach">

        <script>
            window.addEventListener("load", function() {
                console.log("'Todos los recursos terminaron de cargar!");
                let comprados = $("#items_comprados").val().split(",");
                console.log(comprados);

                for (var i = 0; i < comprados.length - 1; i++) {
                    console.log("#img-tag-" + comprados[i]);

                    //$("#img-tag-" + comprados[i]).css("display", "none");
                }
            });
        </script>

        @foreach($items as $item)
        <!--PELOTA-->
        @if($item->nombre=="Pelota")
        <img src="{{$item->descripcion}}" id="img-tag-400" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 13%;right: 81%;" onclick="linkComprar('/tienda/comprar/400')" onpointerenter="showPreview('Pelota: $10 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--RELOJ-->
        @if($item->nombre=="Reloj")
        <img src="{{$item->descripcion}}" id="img-tag-401" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 13%;right: 71%;" onclick="linkComprar('/tienda/comprar/401')" onpointerenter="showPreview('Reloj: $20 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--ALARMA-->
        @if($item->nombre=="Alarma")
        <img src="{{$item->descripcion}}" id="img-tag-402" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 13%;right: 60%;" onclick="linkComprar('/tienda/comprar/402')" onpointerenter="showPreview('Alarma: $30 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--ZAPATO-->
        @if($item->nombre=="Zapato")
        <img src="{{$item->descripcion}}" id="img-tag-403" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 13%;right: 33%;" onclick="linkComprar('/tienda/comprar/403')" onpointerenter="showPreview('Zapato: $40 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--wallet-->
        @if($item->nombre=="Billetera")
        <img src="{{$item->descripcion}}" id="img-tag-404" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 13%;right: 22%;" onclick="linkComprar('/tienda/comprar/404')" onpointerenter="showPreview('Billetera: $50 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--RAQUETA-->
        @if($item->nombre=="Raqueta")
        <img src="{{$item->descripcion}}" id="img-tag-409" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 13%;right: 12%;" onclick="linkComprar('/tienda/comprar/409')" onpointerenter="showPreview('Raqueta: $100 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--BOX-->
        @if($item->nombre=="Guantes")
        <img src="{{$item->descripcion}}" id="img-tag-405" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 41%;right: 81%;" onclick="linkComprar('/tienda/comprar/405')" onpointerenter="showPreview('Guantes: $60 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--BATE-->
        @if($item->nombre=="Bate")
        <img src="{{$item->descripcion}}" id="img-tag-411" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 41%;right: 71%;" onclick="linkComprar('/tienda/comprar/411')" onpointerenter="showPreview('Bate: $120 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--MANCUERNA-->
        @if($item->nombre=="Mancuerna")
        <img src="{{$item->descripcion}}" id="img-tag-410" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 41%;right: 60%;" onclick="linkComprar('/tienda/comprar/410')" onpointerenter="showPreview('Mancuerna: $110 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--botella-->
        @if($item->nombre=="Botella")
        <img src="{{$item->descripcion}}" id="img-tag-406" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 41%;right: 33%;" onclick="linkComprar('/tienda/comprar/406')" onpointerenter="showPreview('Botella: $70 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--calculadora-->
        @if($item->nombre=="Calculadora")
        <img src="{{$item->descripcion}}" id="img-tag-407" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 41%;right: 22%;" onclick="linkComprar('/tienda/comprar/407')" onpointerenter="showPreview('Calculadora: $80 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--ticket-->
        @if($item->nombre=="Ticket")
        <img src="{{$item->descripcion}}" id="img-tag-408" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 41%;right: 12%;" onclick="linkComprar('/tienda/comprar/408')" onpointerenter="showPreview('Ticket: $90 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--camion-->
        @if($item->nombre=="Camion")
        <img src="{{$item->descripcion}}" id="img-tag-412" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 67%;right: 81%;" onclick="linkComprar('/tienda/comprar/412')" onpointerenter="showPreview('Camion: $130 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--OSITO-->
        @if($item->nombre=="Osito")
        <img src="{{$item->descripcion}}" id="img-tag-413" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 67%;right: 71%;" onclick="linkComprar('/tienda/comprar/413')" onpointerenter="showPreview('Osito: $140 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--PUPPY-->
        @if($item->nombre=="Puppy")
        <img src="{{$item->descripcion}}" id="img-tag-414" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 67%;right: 60%;" onclick="linkComprar('/tienda/comprar/414')" onpointerenter="showPreview('Puppy: $150 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--TROFEO-->
        @if($item->nombre=="Trofeo")
        <img src="{{$item->descripcion}}" id="img-tag-415" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 67%;right: 33%;" onclick="linkComprar('/tienda/comprar/415')" onpointerenter="showPreview('Trofeo: $160 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--VARITA-->
        @if($item->nombre=="Varita")
        <img src="{{$item->descripcion}}" id="img-tag-416" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 67%;right: 22%;" onclick="linkComprar('/tienda/comprar/416')" onpointerenter="showPreview('Varita: $170 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        <!--SOMBRERO-->
        @if($item->nombre=="Sombrero")
        <img src="{{$item->descripcion}}" id="img-tag-417" class="inner-image" style="cursor:pointer;width: 90px;height: 90px;position: absolute;top: 67%;right: 12%;" onclick="linkComprar('/tienda/comprar/417')" onpointerenter="showPreview('Sombrero: $180 uLearnet coins')" onpointerout="hidePreview()" />
        @endif
        @endforeach
        <!--ESTANTE1-->
        <img style="border-radius:20px;" src="{{asset('assets/img/FondoTienda.jpg')}}" width="100%">

        <h4 id="opcionUsuarioPreview" style="position: absolute;
    text-align: center;
    font-size: 25px;
    width: 100%;
    margin-top: 10px;"></h4>
    </div>

    <div style="position: relative;display: block;margin-left: auto;margin-right: auto;width: 80%; ">

        <button class="volume-button" onclick="toggleVolume()" style="
    background-color: rgb(14 93 211);
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    left: 28px;
    width: 230px;
    z-index: 20;"> <img id="volume-img-btn" style="width: 25px;" src="{{asset('volume-low.png')}}"> Volumen</button>

        <audio id="musica" autoplay style="border:1px solid black;margin:2%;">
            <source src="{{asset('mp3/aventura.mp3')}}" type="audio/mpeg">
            <script>
                window.addEventListener("load", function() {
                    var audio = document.getElementById("musica");
                    audio.volume = 0.02;
                });

                let nivelVolumen = 0.02;

                function toggleVolume() {
                    var audio = document.getElementById("musica");
                    if (nivelVolumen == 0.02) {
                        audio.volume = 0;
                        nivelVolumen = 0;
                        $("#volume-img-btn").attr("src", "../volume-off.png");
                    } else if (nivelVolumen == 0) {
                        audio.volume = 1;
                        nivelVolumen = 1;
                        $("#volume-img-btn").attr("src", "../volume-up.png");
                    } else if (nivelVolumen == 1) {
                        audio.volume = 0.02;
                        nivelVolumen = 0.02;
                        $("#volume-img-btn").attr("src", "../volume-low.png");
                    }
                }
            </script>
        </audio>

        <div class="row" style="margin-bottom:3%;">
            <div class="col-lg-6">
                @foreach($coins as $coin)
                <button type="button" class="btn btn-warning btn-block" style="background-color: rgb(255,193,7);pointer-events: none;"> <i class="fa fa-star"></i> uLearnet coins disponibles: {{$coin}}</button>
                @endforeach
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-info btn-block" style="pointer-events: none;"> <i class="fa fa-certificate"></i> Módulos completados: {{ $modulosCompletados }}</button>
            </div>
        </div>

    </div>
</body>


@endsection