@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar.sideadmin')
@endsection

@section('contenido')

<h1>Dashbord ADMINISTRADORES</h1>
<H1>Bienvenido {{auth()->user()->nombres}}</H1> <!--no cambiar a usuario, es un metodo propio de auth-->
<p>Rol: {{auth()->user()->rol }}</p>  <!--no cambiar a usuario, es un metodo propio de auth-->
    
@endsection
