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
          <td>DNI</td>
          <td>Sexo</td>
          <td>Edad</td>
           <td>Peso</td>
          <td>Altura</td>
          <td>Alergias</td>
          <td>Grupo Sanguíneo</td>
          <td>Intervenciones</td>
          <td>Enfermedades</td>
        </tr>
    </thead>
    <tbody>
        @foreach($historiales as $historial)
        <tr>
            <td>{{$historial->nombre_apellidos}}</td>
            <td>{{$historial->SIP}}</td>
            <td>{{$historial->nif}}</td>
            <td>{{$historial->sexo}}</td>
            <td>{{$historial->edad}}</td>
            <td>{{$historial->peso}}</td>
            <td>{{$historial->altura}}</td>
            <td>{{decrypt($historial->alergias)}}</td>
            <td>{{decrypt($historial->grupo_sanguineo)}}</td>
            <td>{{decrypt($historial->intervenciones)}}</td>
            <td>{{decrypt($historial->enfermedades)}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
      <p><a href="{{ url('/home') }}">Volver al Menú</a></p>

<div>
@endsection