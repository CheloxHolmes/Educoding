@extends('layout')

@section('content')

<div class="container" style="margin-top:8%;margin-bottom:10%">

    <form method="POST" action="/perfil/avatar" enctype="multipart/form-data">
        @csrf
        <div class="row" style="margin-bottom:2%;margin-top:5%;">

            <div class="col-lg-12" style="text-align: center;">
                @if($avatarImagen=="")
                <img src="{{asset('assets/img/avatar/'.$avatar)}}" height="150px" width="150px">
                @else
                <img src="data:image/png;base64,{{$avatarImagen}}" height="150px" width="150px">
                @endif


                <h2>Bienvenido {{ $usuario->nombres }} {{$usuario->apellido_paterno}} {{$usuario->apellido_materno}}</h2>
            </div>

            <br>


            <div class="col-lg-12" style="text-align: center;">
                <h2>Subir avatar desde imagen</h2>
                <input type="file" name="avatar" class="form-control" style="width: 20%;margin-left: auto;margin-right: auto;" required>

                <button type="submit" href="/perfil/actualizar/{{Auth::user()->id}}" style="padding: 10px !important;background-color: coral;" class="btn">Actualizar avatar</button>
            </div>


            <!--<div class="col-lg-12" style="text-align: center;margin-top:20px">
                <a href="/perfil/actualizar/{{Auth::user()->id}}" class="btn">Actualizar mis datos</a>
            </div>-->

        </div>

    </form>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header" style="color:white !important;">
                    <strong>Estado</strong>
                </div>
                <div class="card-body">
                    @foreach($rol as $r)
                    <p><i class="fa-solid fa-person" style="color: #F3AB67;"></i> <strong>Rol:</strong> {{ $r }}</p>
                    @endforeach
                    @foreach($coins as $coin)
                    <!--<p><i class="fa-solid fa-coins" style="color: #BDB22B;"></i> <strong>Monedas Ulearnet:</strong> {{ $coin }}</p>-->
                    <p><img src="https://i.imgur.com/18eyVtY.png" width="25px" height="25px"> <strong>Monedas Ulearnet:</strong> {{ $coin }}</p>
                    @endforeach
                    <p><i class="fa-solid fa-bars-progress" style="color: #7AC035;"></i> <strong>Módulos
                            Completados:</strong> {{ $modulosCompletados }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header" style="color:white !important;">
                    <strong>Insignias</strong>
                </div>
                <div class="card-body">
                    <h5 class="card-title">¡Aquí exponemos tu honor!</h5>
                    <p class="card-text">Aquí van tus insignias</p>
                    <div class="row">
                        @foreach($insignias as $insignia)
                        <div class="col-lg-6 col-md-6">
                            <img src="{{$insignia->descripcion}}" class="card-img-top" style="width:50px">
                            <p>{{$insignia->nombre}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card" style="margin:1.5%;width:100%">
            <div class="card-header" style="color:white !important;">
                <strong>Inventario</strong>
            </div>
            <div class="card-body">
                <h5 class="card-title">Aqui van los objetos que has comprado en la tienda</h5>
                <p class="card-text">Aquí van los items que has comprado con tanto esfuerzo</p>
                <div class="row" style="background-image: url({{asset('494.jpg')}});background-size: cover;height: 550px;padding: 20px;border-radius: 20px;">
                    @foreach($items as $item)
                    <div class="col-lg-2 col-md-2" style="text-align: center;">
                        <img src="{{$item->descripcion}}" class="card-img-top" style="width: 80px;background-color: white;height: 80px;border-radius: 100%;padding: 3%;">
                        <p style="color:white;text-shadow: 1px 2px black;">{{$item->nombre}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @if($usuario->tipo_usuario_id!=3)
        <div class="card" style="margin:1.5%;width:100%">
            <div class="card-header" style="color:white !important;">
                <strong>Mensajes</strong>
            </div>
            <div class="card-body">
                <h5 class="card-title">Aquí podrás ver todos los mensajes que has recibido o enviar un mensaje</h5>
                <a href="/mensajes/{{$usuario->id}}" class="btn">Ver mensajes</a>
                <a href="/crearMensaje/{{$usuario->id}}" class="btn">Crear mensaje</a>
            </div>
        </div>
        @endif
    </div>
    <br>
    <div style="text-align:center;">
        <h1>Mis dibujos</h1>
    </div>
    @foreach($respuestaImagen as $midibujo)
    <div style="margin-top:3%;margin-bottom:3%;text-align:center;">
        <br>
        <img src="{{$midibujo->imagen}}" style="border: 2px solid #555;" width="100%" height="100%">
    </div>
    @endforeach
</div>
<br>
</div>
</div>


@endsection