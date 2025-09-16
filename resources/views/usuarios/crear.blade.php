@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar.sideadmin')
@endsection

@section('contenido')
<!--Desde aca pdf-->
<h2>Crear usuario</h2>
@if ($errors->any())
    <strong>Error:</strong> Corrige los siguientes campos:
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
    </ul>
@endif

    <form action="{{route('usuarios.store')}}" method="POST">
        @csrf
        <label>Nombre de usuario:</label><input name="nombre_usuario" required><br>
        <label>Email:</label>           <input name="email" type="email" required><br>
        <label>Contrasenia: </label>    <input name="password" type="password" required><br>
        <label>Confirmar contrasenia:</label> <input name="password_confirmation" type="password" required><br>
        <label>Rol:</label><br>
        
        <!--estamos restringiendo roles a elegir-->
        <select name="rol" required>
            <option value="usuario">Adoptante</option>
            <option value="coord">Coordinador</option>
            <option value="admin">Administrador</option>
        </select>
        
        <label>Nombres: </label>        <input name="nombres" required><br>
        <label>Apellido paterno: </label>        <input name="ap_paterno" required><br>
        <label>Apellido materno: </label>        <input name="ap_materno" ><br>
        <label>Ci:               </label>        <input name="ci" required><br>
        <label>Nro celular:      </label>        <input name="nro_celular" required><br>
        <label>Sexo:             </label><br>
         <select name="sexo" required>
            <option value="F">Femenino</option>
            <option value="M">Maculino</option>
        </select>
        <label>Direccion: </label>        <input name="direccion" required><br>
        <br>
        
        <button type="submit" >Guardar</button>

    </form>

<!--hasta aca-->
@endsection