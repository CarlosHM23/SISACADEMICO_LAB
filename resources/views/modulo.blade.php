@extends('adminlte::page')

@section('title', $titulo)

@section('content_header')
    <div class="row">
        <div class="col-sm-6">
            <h1>{{ $titulo }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="breadcrumb-item active">{{ $titulo }}</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
@stop
