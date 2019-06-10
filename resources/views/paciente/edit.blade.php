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
EDITAR PACIENTE  </div>
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
      <form method="post" action="{{ route('pacientes.update', $paciente->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nombre_apellidos">Nombre y Apellidos:</label>
              <input type="text" class="form-control" name="nombre_apellidos" value="{{$paciente->nombre_apellidos}}"/>
          </div>
          <div class="form-group">
              <label for="sip">SIP:</label>
              <input type="text" class="form-control" name="sip" value="{{$paciente->SIP}}"/>
          </div>
              <div class="form-group">
              <label for="telefono">Telefono:</label>
              <input type="text" class="form-control" name="telefono" value="{{$paciente->telefono}}"/>
          </div>
             
          <button type="submit" class="btn btn-primary">Actualizar Paciente </button>
      </form>
  </div>
</div>
@endsection