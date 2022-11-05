@extends('dashmain')

@section('dash')
@if(Auth::user()->tipo_usuario_id==2 || Auth::user()->tipo_usuario_id==1)

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active">Lista Alumnos</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <!-- Lista Alumnos -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <h5 class="card-title">Lista de Alumnos</h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Colegio</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Nivel</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alumnos as $alumno)
                            <tr>
                                <th scope="row"><a href="#"></a>{{$alumno->id}}</th>
                                <td>{{$alumno->nombres}} {{$alumno->apellido_paterno}} {{$alumno->apellido_materno}}</td>
                                @foreach($colegios as $colegio)
                                @if($alumno->colegio_id==$colegio->id)
                                <td><a href="#" class="text-primary"></a>{{$colegio->nombre}}</td>
                                @endif
                                @endforeach
                                @foreach($cursos as $curso)
                                @if($alumno->nivel_id==$curso->id)
                                <td><a href="#" class="text-primary"></a>{{$curso->nombre}}</td>
                                @endif
                                @endforeach
                                @foreach($letras as $letra)
                                @if($alumno->letra_id==$letra->id)
                                <td><a href="#" class="text-primary"></a>{{$letra->nombre}}</td>
                                @endif
                                @endforeach
                                <td>
                                    <a href="/EstadisticaAlumno/{{$alumno->id}}" class="btn btn-success" style="padding: 20px 20px !important; background:green;">Ver Estadísticas</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- Fin Lista Alumnos -->
    </div>
</section>
@endif
@endsection