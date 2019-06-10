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
                        <label for="usuarios">USUARIOS</label>
                            <ul>
                                <li type="circle">Crear usuarios -> /usuarios/create</li>
                                <li><a href="{{ url('/usuarios/create') }}">Crear usuarios</a></li>
                                <li type="circle">Listar, editar o borrar usuarios -> /usuarios</li>
                                 <li><a href="{{ url('/usuarios') }}">Listar, editar o borrar usuarios</a></li>
                            </ul>
                    </div>

                    <div class="form-group">
                        <label for="pacientes">PACIENTES</label>
                            <ul>
                                <li type="circle">Crear pacientes -> /pacientes/create</li>
                                <li><a href="{{ url('/pacientes/create') }}">Crear pacientes</a></li>
                                <li type="circle">Listar, editar y borrar pacientes -> /pacientes</li>
                                <li><a href="{{ url('/pacientes') }}">Listar, editar o borrar pacientes</a>
                            </ul>
                    </div>
                    
                    <div class="form-group">
                        <label for="historiales">HISTORIALES DE PACIENTES</label>
                            <ul>
                                <li type="circle">Crear historiales -> /historiales/create</li>
                                <li><a href="{{ url('/historiales/create') }}">Crear historiales</a></li>
                                <li type="circle">Listar, editar y borrar historiales -> /historiales</li>
                                 <li><a href="{{ url('/historiales') }}">Listar, editar o borrar historiales</a>
                            </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection