@extends('layout')

@section('content')
@if(Auth::user()->tipo_usuario_id==2 || Auth::user()->tipo_usuario_id==1)
<div class="container" style="margin-top:8%;margin-bottom:10%">
    <div class="row" style="margin-bottom:2%;margin-top:5%;">
        <h1>Registrar alumnos</h1>
    </div>
    @if(Session::has('error'))
    <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('error')}}</strong></p><br>
    @endif
    @if(Session::has('success'))
    <p style="text-align:center;"><strong class="col-md-6" style="color:green;">{{Session::get('success')}}</strong></p><br>
    @endif
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Colegio</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Letra (Curso)</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                <form method="POST" action="/registrar/alumno">
                    @csrf
                    <tr>
                        <th>{{$alumno->id}}</th>
                        <td>{{$alumno->nombres}}</td>
                        <td>{{$alumno->apellido_paterno}}</td>
                        <td>{{$alumno->apellido_materno}}</td>
                        <td>
                            <select id="colegio_id" name="colegio_id">
                                @foreach($colegios as $colegio)
                                <option value="{{$colegio->id}}">{{$colegio->nombre}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select id="nivel_id" name="nivel_id">
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
                        <input type="hidden" name="usuario_id" value="{{$alumno->id}}">
                        <input type="hidden" name="fecha" value="{{$fecha}}">
                        <td>
                            <button type="submit" class="btn btn-success">Registrar alumno</button>
                        </td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection