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
          <td>Telefono</td>
        </tr>
    </thead>
    <tbody>
        @foreach($paciente as $paciente)
        <tr>
            <td>{{$paciente->nombre_apellidos}}</td>
            <td>{{$paciente->SIP}}</td>
            <td>{{$paciente->telefono}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
      <p><a href="{{ url('/home') }}">Volver al Menú</a></p>
<div>
@endsection