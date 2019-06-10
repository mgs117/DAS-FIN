@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
   
    VER USUARIO
  </div>
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
          <div class="form-group">
            <ul>
                <li> Nombre y Apellidos: {{ $usuario->nombre }} </li>
                <li> Dni: {{ $usuario->dni }} </li>
                <li> Email: {{ $usuario->email }} </li>
                <li> Rol: {{ $usuario->rol }} </li>
                <li> Especialidad: {{ $usuario->especialidad }} </li>
            </ul>
          </div>
           <p><a href="{{ url('/home') }}">Volver al Menú</a></p>
      </form>

  </div>
</div>
@endsection