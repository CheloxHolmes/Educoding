@extends('dashmain')

@section('dash')

<input type="hidden" id="modulosCompletadosMes" value="@foreach($cantidadesModulosCompletadosMes as $cantidad){{$cantidad}},@endforeach" />
<input type="hidden" id="modulosCorrectosMes" value="@foreach($cantidadesModulosCorrectosMes as $cantidad){{$cantidad}},@endforeach" />
<input type="hidden" id="modulosIncorrectosMes" value="@foreach($cantidadesModulosIncorrectosMes as $cantidad){{$cantidad}},@endforeach" />
<input type="hidden" id="fechasMes" value="@foreach($fechasMes as $cantidad){{$cantidad}},@endforeach" />
<input type="hidden" id="sumaMatematicas" value="{{$sumaMatematicas}}" />
<input type="hidden" id="sumaHistoria" value="{{$sumaHistoria}}" />
<input type="hidden" id="sumaIngles" value="{{$sumaIngles}}" />

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Inicio</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Módulos Completados <span>| Total</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-bars-progress" style="color: #7AC035;"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$sumaModulos}}</h6>
                  <span class="text-success small pt-1 fw-bold">Total plataforma</span> <span class="text-muted small pt-2 ps-1"></span>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Ulearnet Coins Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Monedas Ulearnet<span>| Total alumnos</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="fa-solid fa-coins" style="color: #BDB22B;"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$sumaCoins}}</h6>
                  <span class="text-success small pt-1 fw-bold">Total plataforma</span> <span class="text-muted small pt-2 ps-1"></span>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Alumnos Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">

            <!--<div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>-->

            <div class="card-body">
              <h5 class="card-title">Alumnos <span>| Total</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$cant}}</h6>
                  <span class="text-success small pt-1 fw-bold">Total plataforma</span> <span class="text-muted small pt-2 ps-1"></span>
                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->

        <!-- Reports -->
        <div class="col-12">
          <div class="card">

            <div class="card-body">
              @foreach($colegios as $colegio)
              @if($colegioProfe==$colegio->id)
              <h5 class="card-title">General Diario Alumnos <span>/ {{$colegio->nombre}}</span></h5>
              @endif
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

        <!-- Lista Alumnos -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body">
              <h5 class="card-title">Lista de Alumnos</h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <!--<th scope="col">Colegio</th>-->
                    <th scope="col">Curso</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($alumnos as $alumno)
                  <tr>
                    <th scope="row"><a href="#"></a>{{$alumno->id}}</th>
                    <td>{{$alumno->nombres}}</td>
                    <td>{{$alumno->apellido_paterno}} {{$alumno->apellido_materno}}</td>
                    <td><a href="#" class="text-primary"></a>{{$alumno->email}}</td>
                    <!--@foreach($colegios as $colegio)
                    @if($alumno->colegio_id==$colegio->id)
                    <td>{{$colegio->nombre}}</td>
                    @endif
                    @endforeach-->
                    @foreach($cursos as $curso)
                    @if($alumno->nivel_id==$curso->id)
                    <td>{{$curso->nombre}}</td>
                    @endif
                    @endforeach
                  </tr>
                  @endforeach 
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- Fin Lista Alumnos -->

      </div>
    </div>

    <!-- Right side columns -->
    <div class="col-lg-4">

      <!-- últimos mensajes -->
      <div class="card">

        <div class="card-body">
          <h5 class="card-title">Últimos mensajes</h5>

          <div class="activity">
            @if($countMensajes>0)
            @foreach($mensajes as $mensaje)
            <div class="activity-item d-flex">
              <div class="activite-label"></div>
              <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
              <div class="activity-content">
                <h4>{{$mensaje->nombres}} {{$mensaje->apellido_paterno}}</h4>
                <h5>{{$mensaje->titulo}}</h5>
                <p>{{$mensaje->descripcion}}</p>
                <p>{{$mensaje->fecha_mensaje}}</p>
              </div>
            </div><!-- Fin mensaje item-->
            @endforeach
            @else
            <div class="activity-item d-flex">
              <div class="activite-label"></div>
              <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
              <div class="activity-content">
                <p>Aún no tienes mensajes asignados</p>
              </div>
            </div><!-- Fin mensaje item-->
            @endif
          </div>
        </div>
      </div><!-- Fin ámbito mensajes -->

      <!-- Website Traffic -->
      <div class="card">

        <div class="card-body pb-0">
          <h5 class="card-title">Actividades <span>| Módulos completados total</span></h5>

          <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {

              //Suma actividad Hechizo matemático en dashboard

              sumaMatematicas = $("#sumaMatematicas").val();
              console.log('sumaMatematicas', sumaMatematicas);

              //Suma actividad Some Kind of Spell en dashboard

              sumaIngles = $("#sumaIngles").val();
              console.log('sumaIngles', sumaIngles);

              //Suma actividad Identidad del Pueblo en dashboard

              sumaHistoria = $("#sumaHistoria").val();
              console.log('sumaHistoria', sumaHistoria);

              echarts.init(document.querySelector("#trafficChart")).setOption({
                tooltip: {
                  trigger: 'item'
                },
                legend: {
                  top: '5%',
                  left: 'center'
                },
                series: [{
                  name: 'Módulos completados total',
                  type: 'pie',
                  radius: ['40%', '70%'],
                  avoidLabelOverlap: false,
                  label: {
                    show: false,
                    position: 'center'
                  },
                  emphasis: {
                    label: {
                      show: true,
                      fontSize: '18',
                      fontWeight: 'bold'
                    }
                  },
                  labelLine: {
                    show: false
                  },
                  data: [{
                      value: sumaMatematicas,
                      name: 'Hechizo Matemático'
                    },
                    {
                      value: sumaIngles,
                      name: 'Some Kind of Spell'
                    },
                    {
                      value: sumaHistoria,
                      name: 'Identidad del Pueblo'
                    }
                  ]
                }]
              });
            });
          </script>

        </div>
      </div><!-- End Website Traffic -->

      <!-- Comunicados -->
      <div class="card">

        <div class="card-body pb-0">
          <h5 class="card-title">Lista actividades</h5>

          <div class="news" style="margin-bottom:10px">
            @foreach($actividades as $actividad)
            @if($actividad->id==21 || $actividad->id==22 || $actividad->id==23)
            <div class="post-item clearfix">
              <img src="assets/img/news-1.jpg" alt="">
              <h4 style="margin-left:0px"><a href="/actividad/respuestas/{{$actividad->id}}">{{$actividad->id}} - {{$actividad->nombre}}</a></h4>
              <a href="/actividad/respuestas/{{$actividad->id}}" class="btn btn-primary" style="padding:3px !important"> <i class="fa fa-list"></i> Ver respuestas</a>
            </div>
            @endif
            @endforeach

          </div><!-- End sidebar recent posts-->

        </div>
      </div><!-- End News & Updates -->

    </div><!-- End Right side columns -->

  </div>
</section>

@endsection