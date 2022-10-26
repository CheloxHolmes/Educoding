@extends('dashmain')

@section('dash')
@if(Auth::user()->tipo_usuario_id==2 || Auth::user()->tipo_usuario_id==1)

<input type="hidden" id="modulosCompletadosMes" value="@foreach($cantidadesModulosCompletadosMes as $cantidad){{$cantidad}},@endforeach" />
<input type="hidden" id="modulosCorrectosMes" value="@foreach($cantidadesModulosCorrectosMes as $cantidad){{$cantidad}},@endforeach" />
<input type="hidden" id="modulosIncorrectosMes" value="@foreach($cantidadesModulosIncorrectosMes as $cantidad){{$cantidad}},@endforeach" />
<input type="hidden" id="fechasMes" value="@foreach($fechasMes as $cantidad){{$cantidad}},@endforeach" />

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active">Estadística Curso</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<!-- Reports -->
<div class="col-12">
    <div class="card">

        <div class="card-body">
            @foreach($colegios as $colegio)
            @foreach($cursos as $curso)
            @foreach($letras as $letra)
            @if($colegio->id==$idcolegio AND $curso->id==$idcurso AND $letra->id==$idletra)
            <h5 class="card-title">Curso: {{$curso->nombre}} - {{$letra->nombre}}<span>/ {{$colegio->nombre}}</span></h5>
            @endif
            @endforeach
            @endforeach
            @endforeach

            <!-- Line Chart -->
            <div id="reportsChart"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {

                    listadoCantidadModulos = $("#modulosCompletadosMes").val().split(",");
                    listadoCantidadModulos.pop();
                    console.log("listadoCantidadModulos:", listadoCantidadModulos);

                    listadoCantidadCorrectos = $("#modulosCorrectosMes").val().split(",");
                    listadoCantidadCorrectos.pop();
                    console.log("listadoCantidadCorrectos:", listadoCantidadCorrectos);

                    listadoCantidadIncorrectos = $("#modulosIncorrectosMes").val().split(",");
                    listadoCantidadIncorrectos.pop();
                    console.log("listadoCantidadIncorrectos:", listadoCantidadIncorrectos);

                    fechasMes = $("#fechasMes").val().split(",");
                    fechasMes.pop();

                    new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                            name: 'Módulos completados',
                            data: listadoCantidadModulos,
                        }, {
                            name: 'Intentos correctos',
                            data: listadoCantidadCorrectos,
                        }, {
                            name: 'Intentos incorrectos',
                            data: listadoCantidadIncorrectos,
                        }],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                                show: false
                            },
                        },
                        markers: {
                            size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                            type: "gradient",
                            gradient: {
                                shadeIntensity: 1,
                                opacityFrom: 0.3,
                                opacityTo: 0.4,
                                stops: [0, 90, 100]
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2
                        },
                        xaxis: {
                            type: 'date',
                            categories: fechasMes
                        },
                        tooltip: {
                            x: {
                                format: 'dd/MM/yy HH:mm'
                            },
                        }
                    }).render();
                });
            </script>
            <!-- End Line Chart -->

        </div>

    </div>
</div><!-- End Reports -->

@endif
@endsection