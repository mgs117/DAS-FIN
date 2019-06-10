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
          <td>SIP</td>
          <td>DNI</td>
          <td>sexo</td>
          <td>edad</td>
          <td colspan="2">Acción</td>
        </tr>
    </thead>
    <tbody>
        @foreach($historial as $historial)
        <tr>
            <td>{{$historial->SIP}}</td>
            <td>{{$historial->nif}}</td>
            <td>{{$historial->sexo}}</td>
            <td>{{$historial->edad}}</td>

            <td><a href="{{ route('historiales.edit', $historial->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('historiales.destroy', $historial->id)}}" method="post">
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