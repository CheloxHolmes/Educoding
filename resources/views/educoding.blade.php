@extends('layout')

@section('content')

<div class="container" style="margin-top:8%;margin-bottom:10%">

    <div class="section-tittle section-tittle2 mb-55">
        <div class="front-text" style="margin:5%;">
            <h2 class="">Bienvenido a Educoding</h2>
            <p>¡Hola amiguito, necesitamos tu ayuda!</p>
            <p>El pueblo de Educoding ha caído bajo hechizo en manos el mago Extrañín. Esto debido a que los habitantes de Educoding no cuidaban el medioambiente, no se educaban y no se preocupaban por su salud.</p>
            <div style="margin:5%;">
                <img src="{{asset('assets/img/extrañin.jpg')}}" class="rounded mx-auto d-block" width="40%" height="40%">
            </div>
            <p>Necesitamos tu ayuda para restablecer el pueblo de Educoding a su normalidad, ya que los habitantes han sido convertidos en estatuas inmóviles.</p>
            <div style="margin:5%;">
                <img src="{{asset('assets/img/mapa4.png')}}" class="rounded mx-auto d-block" width="40%" height="40%">
            </div>
            <p><strong>¿Cómo puedes salvar al pueblo?</strong>, muy fácil, jugando a las actividades que se encuentran en el botón "<strong>Explorar la ciudad</strong>" que se encuentra en la parte superior del sitio.</p>
            <p>Recuerda además que al completar módulos podrás ganar uLearnet coins, los cuales podrás canjear en la <a href="/tienda" style="color:blue" target="blank">tienda</a> que aparece en el mismo mapa del pueblo de Educoding.</p>
            <div style="margin:5%;">
                <img src="{{asset('assets/img/coin.png')}}" class="rounded mx-auto d-block" width="40%" height="40%">
            </div>
            <p>¿Estás listo para iniciar tu aventura en Educoding?</p>
            <div style="margin:5%;text-align:center" >
                <a href="/explorar/{{Auth::id()}}" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Explorar la ciudad</a>
            </div>
        </div>
    </div>

</div>

@endsection