@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <p><a href="{{ url('/home') }}">Volver al Menú</a></p>
    EDITAR USUARIO  
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
  </div><br />
    @endif
      <form method="post" action="{{ route('usuarios.update', $usuario->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nombre">Nombre y Apellidos:</label>
              <input type="text" class="form-control" name="nombre" value="{{$usuario->nombre}}"/>
          </div>
          <div class="form-group">
              <label for="dni">DNI:</label>
              <input type="text" class="form-control" name="dni" value="{{$usuario->dni}}"/>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email" value="{{$usuario->email}}"/>
          </div>
          <div class="form-group">
              <label for="password">Password:</label>
              <input type="text" class="form-control" name="password" />
          </div>
          <div class="form-group">
              <label for="rol">Rol :</label>
              <input type="text" class="form-control" name="rol" value="{{$usuario->rol}}"/>
          </div>
          <div class="form-group">
              <label for="especialidad">Especialidad:</label>
              <input type="text" class="form-control" name="especialidad_" value="{{$usuario->especialidad}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar Usuario </button>
      </form>
  </div>
</div>
@endsection