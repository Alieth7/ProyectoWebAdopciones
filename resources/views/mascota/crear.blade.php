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

    <form action="{{route('mascota.store')}}" method="POST">
        @csrf
        <label>Nombre mascota:</label><input name="nombre" required><br>
        <label>Edad:</label>           <input name="edad" required><br>
        <label>Color: </label>    <input name="color"required><br>
        <label>Peso: </label>    <input name="peso"required><br>

         <label>Tamaño:</label><br>
        
        <!--estamos restringiendo tamanios a elegir-->
        <select name="tamanio">
            <option value="pequeño">Pequeño</option>
            <option value="mediano">Mediano</option>
            <option value="grande">Grande</option>
        </select>

        <label>Esterilizado:</label><br>
        
        <select name="esterilizado">
            <option value="1">SI</option>
            <option value="0">NO</option>
        </select>

        <label>Cuidado especial: </label>   <input name="cuidado_especial" required><br>
        <label>Comportamiento: </label>     <input name="comportamiento" required><br>
        <label>Foto: </label>               <input name="url_foto" required><br>
        <label>Estado:</label><br>
        
        <!--estamos restringiendo aca a dos roles a elegir-->
        <select name="estado">
            <option value="disponible">DISPONIBLE</option>
            <option value="no_disponible">NO DISPONIBLE</option>
            <option value="en_tratamiento">EN TRATAMIENTO</option>
            <option value="en_proceso">EN PROCESO DE ADOPCION</option>
            <option value="adoptado">ADOPTADO</option>
        </select>
        <br>
        

    <label for="id_raza">Raza:</label>
    <select name="id_raza" required>
        <option value="">Selecciona una raza</option>
        <option value="1">Angora</option>
        <option value="2">Pastor Aleman</option>
        <!-- y así con todas tus razas -->
    </select>

    <button type="submit" >Guardar</button>

    </form>

<!--hasta aca-->
@endsection