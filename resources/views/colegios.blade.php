@extends('layout')

@section('content')

<div class="container" style="margin-top:8%;margin-bottom:10%">
  <div class="row" style="margin-bottom:2%;margin-top:5%;">
    <h1>Colegios</h1>
  </div>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Direccion</th>
          <th scope="col">Teléfono</th>
          <th scope="col">Comuna</th>
        </tr>
      </thead>
      <tbody>
        @foreach($colegios as $colegio)
        <form method="POST" action="/admin/cambiar/rol">
        @csrf
          <tr>
            <th>{{$colegio->nombre}}</th>
            <td>{{$colegio->direccion}}</td>
            <td>{{$colegio->fono}}</td>
            @foreach($comunas as $comuna)
                @if($colegio->comuna_id==$comuna->id)
                <td>{{$comuna->nombre}}</td>
                @endif
            @endforeach
          </tr>
        </form>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection