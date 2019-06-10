@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Acciones permitidas con sus URLs:

                    <div class="form-group">
                        <label for="pacientes">PACIENTES</label>
                            <ul>
                                <li type="circle">Ver pacientes  -> /listapacientes</li>
                                <li><a href="{{ url('/listapacientes') }}">Ver pacientes</a></li>
                            </ul>
                    </div>

                    <div class="form-group">
                        <label for="citas">CITAS</label>
                            <ul>
                                <li type="circle">Crear cita -> /citas/create</li>
                                <li><a href="{{ url('/citas/create') }}">Crear cita</a></li>
                                <li type="circle">Ver, modificar o borrar citas -> /citas</li>
                                <li><a href="{{ url('/citas') }}">Ver, modificar o borrar citas</a></li>
                            </ul>
                    </div>
                    
            
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection