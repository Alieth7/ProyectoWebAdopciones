 @extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar.sideadmin')
@endsection

@section('contenido')

<!--Desde aca  pdf-->
<h2>Editar pechera</h2>

<form action="{{route('pechera.update',$pechera)}}" method="POST">
    @csrf @method('PUT')

    <label>Estado:</label>
    <select name="estado">
         <option value="disponible" {{$pechera->estado ==='disponible' ? 'selected' : ''}}>DISPONIBLE</option>
         <option value="asignada" {{$pechera->estado ==='asignada' ? 'selected' : ''}}>ASIGNADA</option>
         <option value="en_reparacion" {{$pechera->estado ==='en_reparacion' ? 'selected' : ''}}>EN REPARACION</option>
    </select><br>

    </select><br>
     <button type="submit">Actualizar</button>

</form>
<!--hasta aca-->
@endsection