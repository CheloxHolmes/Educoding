@extends('layout')

@section('content')

<script>

function sintesis(texto) {
        let voices = [];
        const voiceschanged = () => {
            voices = speechSynthesis.getVoices();
            speechSynthesis.getVoices().forEach(voice => {
                //console.log(voice.name, "/", voice.lang)
            })
        }
        speechSynthesis.onvoiceschanged = voiceschanged;
        var sampleText = texto;
        var utterance = new SpeechSynthesisUtterance(sampleText);
        utterance.lang = 'es-MX';
        utterance.pitch = 1;
        utterance.volume = 1;
        utterance.rate = 1;
        speechSynthesis.speak(utterance);
    }

    function mensajesBienenida() {
        console.log("BIENVENIDA");
        $("#btn_sintesis_bienvenida").css("display", "none !important");
        $("#btn_sintesis_bienvenida_div").empty();

        sintesis(`
        ¡Hola, necesitamos tu ayuda!.
        El pueblo de Educóding ha caído bajo hechizo en manos el mago Extrañín. Esto debido a que los habitantes de Educóding no cuidaban el medioambiente, no se educaban y no se preocupaban por su salud.
            `);

            sintesis(`
        Necesitamos tu ayuda para restablecer el pueblo de Educoding a su normalidad, ya que los habitantes han sido convertidos en estatuas inmóviles.
            `);


            sintesis(`
        ¿Cómo puedes salvar al pueblo?, muy fácil, jugando a las actividades que se encuentran en el botón, Explorar la ciudad, que se encuentra en la parte superior del sitio.
            `);

            sintesis(`
        Recuerda además que al completar módulos podrás ganar uLearnet coins, los cuales podrás canjear en la tienda que aparece en el mismo mapa del pueblo de Educóding.
            `);

            sintesis(`
        ¿Estás listo para iniciar tu aventura en Educóding?
            `);

    };


</script>



<div class="container" style="margin-top:8%;margin-bottom:10%">

    <div class="section-tittle section-tittle2 mb-55">
        <div class="front-text" style="margin:5%;">
            <h2 class="">Bienvenid@ a Educoding</h2>
            <div id="btn_sintesis_bienvenida_div" style="margin:5%;text-align:center;">
                <a id="btn_sintesis_bienvenida" onclick="mensajesBienenida()" class="btn btn-warning talk"> <i class="fa fa-volume"></i> Escuchar en audio</a>
            </div>
            <p>¡Hola, necesitamos tu ayuda!</p>
            <p>El pueblo de Educoding ha caído bajo hechizo en manos el mago Extrañín. Esto debido a que los habitantes de Educoding no cuidaban el medioambiente, no se educaban y no se preocupaban por su salud.</p>
            <div style="margin:5%;">
                <img src="https://cdn.pixabay.com/photo/2016/06/13/14/57/wizard-1454385_960_720.png" class="rounded mx-auto d-block" width="40%" height="40%">
            </div>
            <p>Necesitamos tu ayuda para restablecer el pueblo de Educoding a su normalidad, ya que los habitantes han sido convertidos en estatuas inmóviles.</p>
            <div style="margin:5%;">
                <img src="{{asset('assets/img/mapa4.png')}}" class="rounded mx-auto d-block" width="40%" height="40%">
            </div>
            <p><strong>¿Cómo puedes salvar al pueblo?</strong>, muy fácil, jugando a las actividades que se encuentran en el botón "<strong>Explorar la ciudad</strong>", que se encuentra en la parte superior del sitio.</p>
            <p>Recuerda además que al completar módulos podrás ganar uLearnet coins, los cuales podrás canjear en la <a href="/tienda" style="color:blue" target="blank">tienda</a> que aparece en el mismo mapa del pueblo de Educoding.</p>
            <div style="margin:5%;">
                <img src="{{asset('assets/img/coin.png')}}" class="rounded mx-auto d-block" width="40%" height="40%">
            </div>
            <p>¿Estás listo para iniciar tu aventura en Educoding?</p>
            <div style="margin:5%;text-align:center">
                <a href="/explorar/{{Auth::id()}}" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Explorar la ciudad</a>
            </div>
        </div>
    </div>

</div>

@endsection