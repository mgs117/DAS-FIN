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

CREAR HISTORIAL
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
      <form method="post" action="{{ route('historiales.store') }}">
          <div class="form-group">
              @csrf
              <label for="SIP">SIP:</label>
              <input type="text" class="form-control" name="SIP" placeholder="SIP" required>
          </div>
          <div class="form-group">
              <label for="nif">DNI:</label>
              <input type="text" class="form-control" name="nif" placeholder="DNI" required>
          </div>
          <div class="form-group">
              <label for="sexo">Sexo (hombre/mujer):</label>
              <input type="text" class="form-control" name="sexo" placeholder="Sexo" required>
          </div>
           <div class="form-group">
              <label for="edad">Edad:</label>
              <input type="text" class="form-control" name="edad" placeholder="Edad" required>
          </div>
           <div class="form-group">
              <label for="peso">Peso (en gramos):</label>
              <input type="text" class="form-control" name="peso" placeholder="Peso" required>
          </div>
           <div class="form-group">
              <label for="altura">Altura (en cm):</label>
              <input type="text" class="form-control" name="altura" placeholder="Altura" required>
          </div>
           <div class="form-group">
              <label for="grupo_sanguineo">Grupo Sanguíneo:</label>
              <input type="text" class="form-control" name="grupo_sanguineo" placeholder="Grupo Sanguíneo" required>
          </div>
           <div class="form-group">
              <label for="alergias">Alergias:</label>
              <input type="text" class="form-control" name="alergias" placeholder="Alergias" value="ninguna"></>
          </div>
           <div class="form-group">
              <label for="enfermedades">Enfermedades:</label>
              <input type="text" class="form-control" name="enfermedades" placeholder="Enfermedades" value="ninguna"></>
          </div>
           <div class="form-group">
              <label for="intervenciones">Intervenciones:</label>
              <input type="text" class="form-control" name="intervenciones" placeholder="Intervenciones" value="ninguna"></>
          </div>

           
          <button type="submit" class="btn btn-primary">Crear Historial</button>
      </form>
  </div>
</div>
@endsection