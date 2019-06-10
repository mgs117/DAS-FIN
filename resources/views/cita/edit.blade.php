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
EDITAR CITA  </div>
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
      <form method="post" action="{{ route('citas.update', $cita->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="fecha">Fecha:</label>
              <input type="text" class="form-control" name="fecha" value="{{$cita->fecha}}"/>
          </div>
          <div class="form-group">
              <label for="hora">Hora:</label>
              <input type="text" class="form-control" name="hora" value="{{$cita->hora}}"/>
          </div>
           <div class="form-group">
              <label for="paciente_id">Nombre Paciente :</label>
              <select name="paciente_id" class="form-control">
                @foreach ($pacientes as $paciente)
                <!--@if($paciente['id']==old('paciente_id'))-->
                 <!--<option value="{{ $paciente['id']}}" selected> {{ $paciente['nombre_apellidos']}}  </option>
                @else
                <option value="{{ $paciente['id']}}"> {{ $paciente['nombre_apellidos']}}  </option>
                @endif-->
                <option value="{{ $paciente['id']}}" {{ ($paciente['id'] == $cita['paciente_id']) ? 'selected' : '' }} > {{ $paciente['nombre_apellidos']}}  </option>
                @endforeach
              </select>
              
          </div>
           <div class="form-group">
              <label for="medico_id">Nombre Médico :</label>
              <select name="medico_id" class="form-control">
                @foreach ($medicos as $medico)
                <option value="{{ $medico['id'] }}" {{ ($medico['id'] == $cita['medico_id']) ? 'selected' : '' }} >{{ $medico['nombre']}}</option>
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar Cita </button>
      </form>
  </div>
</div>
@endsection