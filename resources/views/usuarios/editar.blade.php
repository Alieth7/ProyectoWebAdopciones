@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar.sideadmin')
@endsection

@section('contenido') 

<!--Desde aca  pdf-->
<h2>Editar Usuario</h2>

<form action="{{route('usuarios.update',$usuarios)}}" method="POST">
    @csrf @method('PUT')
    <label>Nombre de Usuario: </label><input name="nombre_usuario" value="{{ $usuarios->nombre_usuario }}" required><br>
    <label>Email: </label>            <input name="email" value="{{ $usuarios->email }}" required><br>
    <label>Contrasenia (opcional): </label><input name="password" type="password"><br>
    <label>Rol:</label>
    <select name="rol">
        <option value="usuario" {{$usuarios->rol ==='usuario' ? 'selected' : ''}}>Adoptante</option>
        <option value="coord" {{$usuarios->rol ==='coord' ? 'selected' : ''}}>Coordinador</option>
         <option value="admin" {{$usuarios->rol ==='admin' ? 'selected' : ''}}>Administrador</option>
    </select><br>
    <label>Nombres: </label>         <input name="nombres"      value="{{ $usuarios->nombres }}" required><br>
    <label>Apellido paterno: </label><input name="ap_paterno"   value="{{ $usuarios->ap_paterno }}" required><br>
    <label>Apellido materno: </label><input name="ap_materno"   value="{{ $usuarios->ap_materno }}"><br>
    <label>Ci: </label>              <input name="ci"           value="{{ $usuarios->ci }}" required><br>
    <label>Numero de celular: </label><input name="nro_celular" value="{{ $usuarios->nro_celular }}" required><br>
    <label>Sexo: </label>            <input name="sexo"         value="{{ $usuarios->sexo }}" required><br>
    <label>Direccion: </label>       <input name="direccion"    value="{{ $usuarios->direccion }}" required><br>

    <button type="submit">Actualizar</button>

</form>
<!--hasta aca-->
@endsection