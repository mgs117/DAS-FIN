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
          <td>Fecha</td>
          <td>Hora</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cita as $cita)
        <tr>
            <td>{{$cita->nombre_apellidos}}</td>
            <td>{{$cita->SIP}}</td>
            <td>{{$cita->fecha}}</td>
            <td>{{$cita->hora}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
      <p><a href="{{ url('/home') }}">Volver al Menú</a></p>

<div>
@endsection