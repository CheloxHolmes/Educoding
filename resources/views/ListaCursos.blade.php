@extends('dashmain')

@section('dash')
@if(Auth::user()->tipo_usuario_id==2 || Auth::user()->tipo_usuario_id==1)

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active">Lista de Cursos</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <!-- Lista Cursos -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <h5 class="card-title">Seleccionar Curso</h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">Colegio</th>
                                <th scope="col">Curso</th>
                                <th scope="col">Nivel</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cursosProfe as $profecurso)
                            <tr>
                                @foreach($colegios as $colegio)
                                @if($profecurso->colegio_id==$colegio->id)
                                <td>{{$colegio->nombre}}</td>
                                @endif
                                @endforeach
                                @foreach($cursos as $curso)
                                @if($profecurso->nivel_id==$curso->id)
                                <td>{{$curso->nombre}}</td>
                                @endif
                                @endforeach
                                @foreach($letras as $letra)
                                @if($profecurso->letra_id==$letra->id)
                                <td>{{$letra->nombre}}</td>
                                @endif
                                @endforeach
                                <td>
                                    <a href="/EstadisticaCurso/{{$profecurso->colegio_id}}/{{$profecurso->nivel_id}}/{{$profecurso->letra_id}}" class="btn btn-success" style="padding: 20px 20px !important; background:green;">Ver Estadísticas</a>
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