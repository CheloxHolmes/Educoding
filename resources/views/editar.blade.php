@extends('layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mx-auto">
            <div class="post-preview" style="margin-bottom: 8%;">
                <div class="card">
                    <div class="card-header">{{ __('Editar perfil') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/editar/perfil/{{Auth::user()->id}}" enctype="multipart/form-data">

                            @csrf
                            @foreach($usuario as $user)
                            @if(Session::has('userCorto'))
                            <p style="text-align:center;"><strong class="col-md-6" style="color:red;">{{Session::get('userCorto')}}</strong></p><br>
                            @endif
                            <!-- Nombre -->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre')}}</label>
                                <div class="col-md-6">
                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" max="30" name="name" required value="{{ $user->name }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <!-- Username -->
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de usuario')}}</label>
                                <div class="col-md-6">
                                    <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" autocomplete="username" autofocus>
                                </div>
                            </div>

                            <!-- Telefono -->
                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono')}}</label>
                                <div class="col-md-6">
                                    <input id="telefono" type="telefono" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $user->telefono }}" autocomplete="telefono" autofocus>
                                </div>
                            </div>

                            <!-- Dirección -->
                            <div class="form-group row">
                                <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirrección')}}</label>
                                <div class="col-md-6">
                                    <input id="direccion" type="direccion" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ $user->direccion }}" autocomplete="direccion" autofocus></input>
                                </div>
                            </div>

                            <br>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Editar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection