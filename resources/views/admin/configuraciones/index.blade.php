@extends('adminlte::page')



@section('content_header')
    <h1>Configuraciones</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card cadd-primary">
                <div class="card-header">
                    <h3 class="card-title">Configuración de la Aplicación</h3>  
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.configuraciones.create') }}" method="POST"></form>
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre de la Aplicación</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-university"></i></span>
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la Aplicación" value="{{ old('nombre', $configuracion->nombre ?? '') }}">
                                            </div>
                                            @error('nombre')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Teléfono" value="{{ old('descripcion', $configuracion->descripcion ?? '') }}">
                                                </div>
                                                @error('descripcion')
                                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telefono">Teléfono</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="{{ old('telefono', $configuracion->telefono ?? '') }}">
                                                    </div>
                                                    @error('telefono')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="direccion">direccion</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="direccion" value="{{ old('direccion', $configuracion->direccion ?? '') }}">
                                                    </div>
                                                    @error('direccion')
                                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop