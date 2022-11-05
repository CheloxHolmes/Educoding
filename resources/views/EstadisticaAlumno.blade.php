@extends('dashmain')

@section('dash')
@if(Auth::user()->tipo_usuario_id==2 || Auth::user()->tipo_usuario_id==1)

<!-- Mat -->
<input type="hidden" id="modulosCompletadosMesMat" value="@foreach($cantidadesModulosCompletadosMesMat as $cantidadMat){{$cantidadMat}},@endforeach" />
<input type="hidden" id="modulosCorrectosMesMat" value="@foreach($cantidadesModulosCorrectosMesMat as $cantidadMat){{$cantidadMat}},@endforeach" />
<input type="hidden" id="modulosIncorrectosMesMat" value="@foreach($cantidadesModulosIncorrectosMesMat as $cantidadMat){{$cantidadMat}},@endforeach" />
<!-- His -->
<input type="hidden" id="modulosCompletadosMesHist" value="@foreach($cantidadesModulosCompletadosMesHist as $cantidadHist){{$cantidadHist}},@endforeach" />
<input type="hidden" id="modulosCorrectosMesHist" value="@foreach($cantidadesModulosCorrectosMesHist as $cantidadHist){{$cantidadHist}},@endforeach" />
<input type="hidden" id="modulosIncorrectosMesHist" value="@foreach($cantidadesModulosIncorrectosMesHist as $cantidadHist){{$cantidadHist}},@endforeach" />
<!-- Ing -->
<input type="hidden" id="modulosCompletadosMesIng" value="@foreach($cantidadesModulosCompletadosMesIng as $cantidadIng){{$cantidadIng}},@endforeach" />
<input type="hidden" id="modulosCorrectosMesIng" value="@foreach($cantidadesModulosCorrectosMesIng as $cantidadIng){{$cantidadIng}},@endforeach" />
<input type="hidden" id="modulosIncorrectosMesIng" value="@foreach($cantidadesModulosIncorrectosMesIng as $cantidadIng){{$cantidadIng}},@endforeach" />
<!-- Mat -->
<input type="hidden" id="fechasMesMat" value="@foreach($fechasMesMat as $cantidadMat){{$cantidadMat}},@endforeach" />
<!-- His -->
<input type="hidden" id="fechasMesHist" value="@foreach($fechasMesHist as $cantidadHist){{$cantidadHist}},@endforeach" />
<!-- Ing -->
<input type="hidden" id="fechasMesIng" value="@foreach($fechasMesIng as $cantidadIng){{$cantidadIng}},@endforeach" />

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active">Estadística Alumno</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<!-- Reporte Hechizo Matemático -->
<div class="col-12">
    <div class="card">

        <div class="card-body">
            @foreach($alumnos as $alumno)
            <h5 class="card-title"><span>{{$alumno->nombres}} {{$alumno->apellido_paterno}} {{$alumno->apellido_materno}}</span> / Hechizo Matemático</h5>
            @endforeach
        </div>
        <!-- Line Chart -->
        <div id="reportsChartMat"></div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {

                listadoCantidadModulos = $("#modulosCompletadosMesMat").val().split(",");
                listadoCantidadModulos.pop();
                console.log("listadoCantidadModulos:", listadoCantidadModulos);

                listadoCantidadCorrectos = $("#modulosCorrectosMesMat").val().split(",");
                listadoCantidadCorrectos.pop();
                console.log("listadoCantidadCorrectos:", listadoCantidadCorrectos);

                listadoCantidadIncorrectos = $("#modulosIncorrectosMesMat").val().split(",");
                listadoCantidadIncorrectos.pop();
                console.log("listadoCantidadIncorrectos:", listadoCantidadIncorrectos);

                fechasMes = $("#fechasMesMat").val().split(",");
                fechasMes.pop();

                new ApexCharts(document.querySelector("#reportsChartMat"), {
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

<!-- Reporte Identidad del Pueblo -->
<div class="col-12">
    <div class="card">

        <div class="card-body">
            @foreach($alumnos as $alumno)
            <h5 class="card-title"><span>{{$alumno->nombres}} {{$alumno->apellido_paterno}} {{$alumno->apellido_materno}}</span> / Identidad del Pueblo</h5>
            @endforeach
        </div>

        <!-- Line Chart -->
        <div id="reportsChartHist"></div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {

                listadoCantidadModulos = $("#modulosCompletadosMesHist").val().split(",");
                listadoCantidadModulos.pop();
                console.log("listadoCantidadModulos:", listadoCantidadModulos);

                listadoCantidadCorrectos = $("#modulosCorrectosMesHist").val().split(",");
                listadoCantidadCorrectos.pop();
                console.log("listadoCantidadCorrectos:", listadoCantidadCorrectos);

                listadoCantidadIncorrectos = $("#modulosIncorrectosMesHist").val().split(",");
                listadoCantidadIncorrectos.pop();
                console.log("listadoCantidadIncorrectos:", listadoCantidadIncorrectos);

                fechasMes = $("#fechasMesHist").val().split(",");
                fechasMes.pop();

                new ApexCharts(document.querySelector("#reportsChartHist"), {
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

<!-- Reporte Some Kind of Spell -->
<div class="col-12">
    <div class="card">
        @foreach($alumnos as $alumno)
        <div class="card-body">
            <h5 class="card-title"><span>{{$alumno->nombres}} {{$alumno->apellido_paterno}} {{$alumno->apellido_materno}}</span> / Some Kind of Spell</h5>
            @endforeach
        </div>
        <!-- Line Chart -->
        <div id="reportsChartIng"></div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {

                listadoCantidadModulos = $("#modulosCompletadosMesIng").val().split(",");
                listadoCantidadModulos.pop();
                console.log("listadoCantidadModulos:", listadoCantidadModulos);

                listadoCantidadCorrectos = $("#modulosCorrectosMesIng").val().split(",");
                listadoCantidadCorrectos.pop();
                console.log("listadoCantidadCorrectos:", listadoCantidadCorrectos);

                listadoCantidadIncorrectos = $("#modulosIncorrectosMesIng").val().split(",");
                listadoCantidadIncorrectos.pop();
                console.log("listadoCantidadIncorrectos:", listadoCantidadIncorrectos);

                fechasMes = $("#fechasMesIng").val().split(",");
                fechasMes.pop();

                new ApexCharts(document.querySelector("#reportsChartIng"), {
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

<!-- Imagen Lenguaje -->

<div style="margin-top:3%;margin-bottom:3%;text-align:center;">
    <h1>Dibujos del estudiante</h1>
    <br>
    @foreach($respuestaImagen as $imagen)
    <img src="{{$imagen->imagen}}" style="border: 2px solid #555;" width="90%" height="90%">
    @endforeach
</div>

@endif
@endsection