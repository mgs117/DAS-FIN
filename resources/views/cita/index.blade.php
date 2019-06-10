@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Paciente</td>
          <td>SIP</td>
          <td>Médico</td>
          <td>Fecha</td>
          <td>Hora</td>
          <td colspan="2">Acción</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cita as $cita)
        <tr>
            <td>{{$cita->nombre_apellidos}}</td>
            <td>{{$cita->SIP}}</td>
            <td>{{$cita->nombre}}</td>
            <td>{{$cita->fecha}}</td>
            <td>{{$cita->hora}}</td>

            <td><a href="{{ route('citas.edit', $cita->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('citas.destroy', $cita->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
      <p><a href="{{ url('/home') }}">Volver al Menú</a></p>
<div>
@endsection