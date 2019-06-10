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
CREAR PACIENTE
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
      <form method="post" action="{{ route('pacientes.store') }}">
          <div class="form-group">
              @csrf
              <label for="nombre_apellidos">Nombre y Apellidos:</label>
              <input type="text" class="form-control" name="nombre_apellidos" placeholder="Nombre y Apellidos" required>
          </div>
          <div class="form-group">
              <label for="SIP">SIP :</label>
              <input type="text" class="form-control" name="SIP" placeholder="SIP" required>
          </div>
           <div class="form-group">
              <label for="telefono">Telefono :</label>
              <input type="text" class="form-control" name="telefono" placeholder="Telefono" required>
          </div>
           
          <button type="submit" class="btn btn-primary">Crear Paciente</button>
      </form>
  </div>
</div>
@endsection