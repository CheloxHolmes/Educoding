@extends('layout')

@section('content')
@if($usuario->tipo_usuario_id==1)
<div class="container" style="margin-top:8%;margin-bottom:10%">
  <div class="row" style="margin-bottom:2%;margin-top:5%;">
    <h1>Listado de usuarios</h1>
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
          <th scope="col">Email</th>
          <th scope="col">Rol</th>
          <th scope="col">Cambiar rol</th>
          <th>Acción</th>
        </tr>
      </thead>
      <tbody>
        @foreach($allUsers as $usuario)
        <form method="POST" action="/admin/cambiar/rol">
        @csrf
          <tr>
            <th scope="row">{{$usuario->id}}</th>
            <td>{{$usuario->nombres}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->nombre}}</td>
            <td>
              <select id="rol" name="rol">
                <option value="1">Administrador</option>
                <option value="2">Profesor</option>
                <option value="3">Alumno</option>
                <option value="4">Demo</option>
                <option value="5">Coordinador</option>
                <option value="6">UTP</option>
                <option value="7">Director</option>
                <option value="8">Apoderado</option>
              </select>
            </td>
            <input type="hidden" name="id_usuario" value="{{$usuario->id}}">
            <td>
              <button type="submit" class="btn btn-success">Cambiar Rol</button>
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