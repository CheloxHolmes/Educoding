@extends('dashmain')
@section('dash')
@if(Auth::user()->tipo_usuario_id==2 || Auth::user()->tipo_usuario_id==1)
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active">Enviar Insignias</li>
        </ol>
    </nav>
    @if(Session::has('error'))
        <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('error')}}</strong></p><br>
    @endif
    @if(Session::has('success'))
        <p style="text-align:center;"><strong class="col-md-6" style="color:green;">{{Session::get('success')}}</strong></p><br>
    @endif
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="row">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Asignadas</th>
                    <th scope="col">Insignia</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                <form method="POST" action="/insignia/asignar/alumno">
                @csrf
                    <tr>
                        <th scope="row">{{$alumno->id}}</th>
                        <td>{{$alumno->nombres}}</td>
                        <td>{{$alumno->email}}</td>
                        <td>
                            <ul>
                                @foreach($alumno->insignias as $asi)
                                <li>{{$asi->nombre}} <a style="color:red" href="/insignias/asignacion/eliminar/{{$asi->sesion_id}}/{{$asi->id_elemento}}"> <i class="fa fa-trash"></i> Eliminar</a> </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <select id="insignia" name="insignia">
                                @foreach($insignia as $ing)
                                <option value="{{$ing->id}}">{{$ing->nombre}}</option>
                                @endforeach
                            </select>

                            <input type="hidden" name="id_alumno" value="{{$alumno->id}}">
                        </td>
                        <td>
                            <button type="submit" class="btn">Otorgar Insignia</button>
                        </td>
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endif
@endsection