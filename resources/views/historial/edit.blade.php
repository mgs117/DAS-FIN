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
EDITAR USUARIO  </div>
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
      <form method="post" action="{{ route('historiales.update', $historial->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="SIP">SIP:</label>
              <input type="text" class="form-control" name="SIP" value="{{$historial->SIP}}"/>
          </div>
          <div class="form-group">
              <label for="nif">DNI:</label>
              <input type="text" class="form-control" name="nif" value="{{$historial->nif}}"/>
          </div>
          <div class="form-group">
              <label for="sexo">Sexo:</label>
              <input type="text" class="form-control" name="sexo" value="{{$historial->sexo}}"/>
          </div>
              <div class="form-group">
              <label for="edad">Edad:</label>
              <input type="text" class="form-control" name="edad" value="{{$historial->edad}}"/>
          </div>
              <div class="form-group">
              <label for="peso">Peso:</label>
              <input type="text" class="form-control" name="peso" value="{{$historial->peso}}"/>
          </div>
              <div class="form-group">
              <label for="altura">Altura:</label>
              <input type="text" class="form-control" name="altura" value="{{$historial->altura}}"/>
          </div>
              <div class="form-group">
              <label for="grupo_sanguineo">Grupo Sanguíneo:</label>
              <input type="text" class="form-control" name="grupo_sanguineo" value="{{decrypt($historial->grupo_sanguineo)}}"/>
          </div>
           <div class="form-group">
              <label for="alergias">Alergias:</label>
              <input class="form-control" name="alergias" placeholder="Alergias" value="{{decrypt($historial->alergias)}}"/>
          </div>
           <div class="form-group">
              <label for="enfermedades">Enfermedades:</label>
              <input class="form-control" name="enfermedades" placeholder="Enfermedades" value="{{decrypt($historial->enfermedades)}}"/>
          </div>
           <div class="form-group">
              <label for="intervenciones">Intervenciones:</label>
              <input class="form-control" name="intervenciones" placeholder="Intervenciones" value="{{decrypt($historial->intervenciones)}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar Historial </button>
      </form>
  </div>
</div>
@endsection