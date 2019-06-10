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
          <td>Usuario</td>
          <td>Rol</td>
          <td>Especialidad</td>
          <td colspan="3">Acción</td>
        </tr>
    </thead>
    <tbody>
        @foreach($usuario as $usuario)
        <tr>
            <td>{{$usuario->nombre}}</td>
            <td>{{$usuario->rol}}</td>
            <td>{{$usuario->especialidad}}</td>

             <td><a href="{{ route('usuarios.show',$usuario->id)}}" class="btn btn-primary">Ver usuario</a></td>
            <td><a href="{{ route('usuarios.edit',$usuario->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('usuarios.destroy', $usuario->id)}}" method="post">
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