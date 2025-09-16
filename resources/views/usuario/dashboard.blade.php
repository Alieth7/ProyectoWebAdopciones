@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar.sideuser')
@endsection

@section('contenido')

<!--<p>Ingresaste a dashboard de usuario, aca va los gestionamientos,
    si queremos personalizar el side bar, mejor no modularizarlo,
    sera mas dificil controlar el side bar de cada rol</p>
-->
<h1>Dashbord USUARIOS</h1>
<H1>Bienvenido {{auth()->user()->nombres}}</H1>
<p>Rol: {{auth()->user()->role }}</p>
    

@endsection
