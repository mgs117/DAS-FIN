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
CREAR USUARIO
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
      <form method="post" action="{{ route('usuarios.store') }}">
          <div class="form-group">
              @csrf
              <label for="nombre">Nombre y Apellidos:</label>
              <input type="text" class="form-control" name="nombre" placeholder="Nombre y Apellidos" required>
          </div>
          <div class="form-group">
              <label for="DNI">DNI :</label>
              <input type="text" class="form-control" name="dni" placeholder="DNI" required>
          </div>
           <div class="form-group">
              <label for="email">Email :</label>
              <input type="text" class="form-control" name="email" placeholder="Email" required>
          </div>
           <div class="form-group">
              <label for="password">Contraseña :</label>
              <input type="text" class="form-control" name="password" placeholder="Contraseña" required>
          </div>
           <div class="form-group">
              <label for="rol">Rol :</label>
              <input type="text" class="form-control" name="rol" placeholder="Rol" required>
          </div>
            <div class="form-group">
              <label for="rol">Especialidad :</label>
              <input type="text" class="form-control" name="especialidad" placeholder="Especialidad" >
          </div>
          <button type="submit" class="btn btn-primary">Crear Usuario</button>
      </form>
  </div>
</div>
@endsection