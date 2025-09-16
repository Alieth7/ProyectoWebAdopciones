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

    <form action="{{route('pechera.store')}}" method="POST">
        @csrf
        
         <label>Estado:</label><br>
<!--agregar mas variables, se ve muy vacio-->
        <!--restringiendo ESTADOS a elegir-->
        <select name="estado">
            <option value="disponible">DISPONIBLE</option>
            <option value="asignada">ASIGNADA</option>
            <option value="en_reparacion">EN REPARACION</option>
        </select>


        <button type="submit" >Guardar</button>

    </form>

<!--hasta aca-->
@endsection