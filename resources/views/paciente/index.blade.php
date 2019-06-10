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
          <td colspan="2">Acción</td>
        </tr>
    </thead>
    <tbody>
        @foreach($paciente as $paciente)
        <tr>
            <td>{{$paciente->nombre_apellidos}}</td>
            <td>{{$paciente->SIP}}</td>
            <td>{{$paciente->telefono}}</td>
            <td><a href="{{ route('pacientes.edit', $paciente->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('pacientes.destroy', $paciente->id)}}" method="post">
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