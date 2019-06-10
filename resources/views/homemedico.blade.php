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
                                <li type="circle">Ver mis pacientes  -> /mispacientes</li>
                                <li><a href="{{ url('/mispacientes') }}">Ver mis pacientes</a></li>
                            </ul>      
                    </div>

                    <div class="form-group">
                        <label for="citas">CITAS</label>
                            <ul>
                                <li type="circle">Ver mis citas-> /miscitas </li>
                                <li><a href="{{ url('/miscitas') }}">Ver mis citas</a></li>
                            </ul>
                            
                    </div>
                    
                    <div class="form-group">
                        <label for="citas">HISTORIALES</label>
                            <ul>
                                <li type="circle">Ver historiales de mis pacientes-> /mishistoriales</li>
                                <li><a href="{{ url('/mishistoriales') }}">Ver historiales de mis pacientes</a></li>
                            </ul>
                            
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection