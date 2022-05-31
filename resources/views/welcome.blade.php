@extends('layouts.app')

@section('content')
    <nav class="container navbar">
        <div class="container-fluid">
            <a class="navbar-brand">La Nueva Realidad</a>
            <div class="d-flex justify-content-end">
                <a class="nav-link" href="">Dashboard</a>
                <a class="nav-link" href="{{route('login')}}">Acceder</a>
                <a class="nav-link" href="">Crear cuenta</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>La Nueva Realidad Microempresarios Casanareños</h1>
            </div>
        </div>
    </div>
@endsection
