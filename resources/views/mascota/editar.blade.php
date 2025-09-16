@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar.sideadmin')
@endsection

@section('contenido')

<!--Desde aca  pdf-->
<h2>Editar Mascota</h2> 
<!--agregre ->id-->
    
<form method="POST" action="{{ route('mascota.update', $mascota) }}">
    @csrf
    @method('PUT')

    <label>Nombre de la mascota: </label><input name="nombre" value="{{ $mascota->nombre}}" required><br>
    <label>Edad: </label>            <input name="edad" value="{{ $mascota->edad }}" required><br>
    <label>Color: </label><input name="color" value="{{ $mascota->color}}" required><br>
    <label>Peso: </label><input name="peso" value="{{ $mascota->peso}}" required><br>
    
    <label>Tamanio:</label>
    <select name="tamanio">
        <option value="pequeño" {{$mascota->tamanio === 'pequeño' ? 'selected' : ''}}>PEQUEÑO</option>
        <option value="mediano" {{$mascota->tamanio ==='mediano' ? 'selected' : ''}}>MEDIANO</option>
         <option value="grande" {{$mascota->tamanio ==='grande' ? 'selected' : ''}}>GRANDE</option>
    </select><br>
    
    <label>Esterilizado:</label>
    <select name="esterilizado">
        <option value="1" {{$mascota->esterilizado === 1 ? 'selected' : ''}}>SI</option>
        <option value="0" {{$mascota->esterilizado === 0 ? 'selected' : ''}}>NO</option>
      </select><br>

    <label>Cuidado especial: </label>   <input name="cuidado_especial"value="{{ $mascota->cuidado_especial }}" ><br>
    <label>Comportamiento: </label>     <input name="comportamiento"   value="{{ $mascota->comportamiento }}" required><br>
    <label>Foto: </label>               <input name="url_foto"          value="{{ $mascota->url_foto }}"><br>
    
    <label>Estado:</label>
    <select name="estado">
        <option value="disponible" {{$mascota->estado ==='disponible' ? 'selected' : ''}}>DISPONIBLE</option>
        <option value="no_disponible" {{$mascota->estado ==='no_disponible' ? 'selected' : ''}}>NO DISPONIBLE</option>
        <option value="en_tratamiento" {{$mascota->estado ==='en_tratamiento' ? 'selected' : ''}}>EN TRATAMIENTO</option>
        <option value="en_proceso" {{$mascota->estado ==='en_proceso' ? 'selected' : ''}}>EN PROCESO DE ADOPCION</option>
        <option value="adoptado" {{$mascota->estado ==='adoptado' ? 'selected' : ''}}>ADOPTADO</option>
        
    </select><br>
   
   <label for="id_raza">Raza:</label>
    <select name="id_raza" required>
        <option value="">Selecciona una raza</option>
        <option value="1" {{ $mascota->id_raza == 1 ? 'selected' : '' }}>Angora</option>
        <option value="2" {{ $mascota->id_raza == 2 ? 'selected' : '' }}>Pastor Alemán</option>
        Agrega más opciones según tus razas 
    </select><br>


    <button type="submit">Actualizar</button>

</form>
<!--hasta aca-->
@endsection