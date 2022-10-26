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
                            <tr>
                                <td>
                                    <select id="colegio_id" name="colegio_id">
                                        @foreach($colegios as $colegio)
                                        <option value="{{$colegio->id}}">{{$colegio->nombre}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select id="curso_id" name="curso_id">
                                        @foreach($cursos as $curso)
                                        <option value="{{$curso->id}}">{{$curso->nombre}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select id="letra_id" name="letra_id">
                                        @foreach($letras as $letra)
                                        <option value="{{$letra->id}}">{{$letra->nombre}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <a href="/EstadisticaCurso/{{$colegio->id}}/{{$curso->id}}/{{$letra->id}}" class="btn btn-success" style="padding: 20px 20px !important; background:green;">Ver Estadísticas</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- Fin Lista Alumnos -->
    </div>
</section>
@endif
@endsection