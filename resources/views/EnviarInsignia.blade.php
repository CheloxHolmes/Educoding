@extends('dashmain')

@section('dash')
@if(Auth::user()->rol=="profesor")
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Inicio</a></li>
            <li class="breadcrumb-item active">Enviar Insignias</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Insignia</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                <tr>
                    <th scope="row">{{$alumno->id}}</th>
                    <td>{{$alumno->name}}</td>
                    <td>{{$alumno->email}}</td>
                    <td>
                        <select>
                            @foreach($insignia as $ing)
                            <option>{{$ing->titulo}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><a href="" class="btn">Otorgar Insignia</a></li>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endif
@endsection