@extends('layouts.app')
<style>
    #chartsperson {
        max-width: 600px;
    }
</style>
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 shadow-sm p-3"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
            
            <hr>
            <h1 class="mt-4">Graficas principales </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Graficas | <a href="{{url('charts')}}">Ver más</a></li>
            </ol>
            @include('charts.index')   
        </div>
    </main>
    <br>
@section('js')
    @include('charts/js.js')    
@endsection

@endsection
