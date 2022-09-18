@extends('layout')

@section('content')
@if(Auth::user()->tipo_usuario_id!=3)
<div class="container" style="margin-top:8%;margin-bottom:10%">
  <div class="row" style="margin-bottom:2%;margin-top:5%;">
    <h1>Cursos Educoding</h1>
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
          <th scope="col">Curso</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cursos as $curso)
          <tr>
            <th>{{$curso->id}}</th>
            <td>{{$curso->nombre}}</td>
          </tr>
        </form>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endif
@endsection