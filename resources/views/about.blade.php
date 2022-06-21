@extends('layout')

@section('content')

<section class="about-area1 fix pt-10">
    <div class="support-wrapper align-items-center">
        <div class="left-content1" style="margin-top:10%">

            <!-- section tittle -->
            <div class="section-tittle section-tittle2 mb-55">
                <div class="front-text">
                    <h2 class="">Educoding</h2>
                    <p>Dada la necesidad permanente de fortalecer los aprendizajes de los estudiantes de educación primaria y secundaria de los establecimientos de nuestro país, la Dirección de Extensión y Comunicaciones de la Facultad de Filosofía y Humanidades de la Universidad de Chile en conjunto con Asesorías B-Learning Site, puso en marcha el Programa de Gestión de la Calidad y Seguimiento de los Aprendizajes (GCSA) hace ya diez años.</p>
                    <p>El propósito del Programa tiene su base en un Proceso de Evaluación Formativa apoyado por las tecnologías de información y cuyo principal sistema se encuentra alojado y disponible en “www.ulearnet.org”.</p>
                    <p>Este Sistema de Evaluación basado en Web se levanta para ser aplicado en toda la educación primaria y secundaria y sobre los subsectores de Lenguaje, Matemática, Historia, Ciencias e Íngles. Se asienta en una serie de instrumentos de medición estandarizados que son aplicados en formato online a los estudiantes de los colegios y cuyos resultados, incluyendo los propios instrumentos, son liberados para los establecimientos educativos, estudiantes y la familia en forma inmediata luego de su rendición, provocando con ello un proceso reflexivo de mayor efectividad en lo que se refiere al fortalecimiento del proceso de aprendizaje, producto de la metacognición que desarrolla cada estudiante cuando recibe el feedback de la rendición. El Sistema de Evaluación basado en Web: uLearnet, provee de una gama de servicios que se modelan en conjunto con el Establecimiento Educativo. uLearnet no impone, el establecimiento decide. En efecto, se puede ajustar los niveles y subsectores que se desea intervenir y el número de evaluaciones que se considerarán en cada año académico. De esa manera, las actividades a realizar se pueden resumir en:</p>
                    <p>Planificar las evaluaciones conforme al curriculum establecido por el Ministerio de Educación chileno y/o conforme a los niveles de profundización y amplitud que cada establecimiento haya definido como parte de su modelo educativo.</p>
                    <p>Calendarizar la aplicación de los instrumentos de medición requeridos por cada establecimiento.</p>
                    <p>Aplicar los instrumentos de medición a los estudiantes de cada curso.</p>
                    <p>Obtener los más de 30 resultados estadísticos de manera inmediata, con lo cual el establecimiento educativo puede realizar, de forma muy expedita, los remediales que estime oportunos.</p>
                    @foreach($test as $tuki)
                    {{$tuki->nombres}}
                    @endforeach
                </div>
            </div>

        </div>
        <div class="right-content1">
            <!-- img -->
            <div class="right-img" style="height:50%; width:50%">
                <img src="{{asset('assets/img/about/about-1.jpg')}}" alt="">               
            </div>
        </div>

    </div>
</section>
<!-- About Area End -->

@endsection