@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar.sideadmin')
@endsection

@section('contenido')

<!--desde aca pdf-->
@if(auth()->user()->rol ==='admin')
    <a href="{{route('admin.dashboard')}}">
        Volver al dashboard
    </a>
@endif
<!--mantener en ingles para no crear una ruta manual
    Route::get('/usuarios/crear', [UsuarioController::class, 'create'])->name('usuarios.crear');
 esta accediendo a la funcion, no a la vista-->

@if(session('success'))
    <p>{{session('success')}}</p>
@endif

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2>Lista de Mascotas</h2>
                <a href="{{route('mascota.create')}}" class="btn icon btn-primary"><i class="bi bi-pencil"></i>  Crear nueva mascota </a>
                
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" >Dashboard</a></li> 
                        <li class="breadcrumb-item active" aria-current="page">Lista de mascotas</li>

                       
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Simple Datatable
                </h5>
            </div>
            <div class="card-body">

<table class="table table-striped" id="table1">
    <thead>
        <tr>
            <th>Nombre</th> 
            <th>Edad</th>
            <th>Color</th>
            <th>Peso</th>
            <th>Tamanio</th>
            <th>Esterilizado</th>
            <th>Cuidado especial</th>
            <th>Comportamiento</th>
            <th>Foto</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($mascotas as $mascota)
            <tr>
                <td>{{$mascota->nombre}}</td>
                <td>{{$mascota->edad}}</td>
                <td>{{$mascota->color}}</td>
                <td>{{$mascota->peso}}</td>
                <td>{{$mascota->tamanio}}</td>
                <td>{{$mascota->esterilizado}}</td>
                <td>{{$mascota->cuidado_especial}}</td>
                <td>{{$mascota->comportamiento}}</td>
                <td>{{$mascota->url_foto}}</td>
                <td>{{$mascota->estado}}</td>
                <!--  <td>{{$mascota->id_raza}}</td> en lugar de esto para una tabla relacionada:-->
                <td>{{$mascota->razas->nombre}}</td>
                <!--esto devuelve directamente el nombre,eloquent devuelve el MODELO($mascota->raza()devuelve la relacion) y luego un atributo,
                es de manera mucho mas directa ya que se tiene la relacion en los modelos definida entre tablas, eloquent lo hace mas facil todo-->
                <!--<td>{ { opt ional($m -  >raza)->nomb re_r aza ? ? 'Sin raza' } }</td>-->
                <td>
                    <a href="{{route('mascota.edit',$mascota)}}" class="btn icon icon-left btn-primary"> <i data-feather="edit"> </i>Editar </a>
                    
                    
                    <form action="{{route('mascota.destroy',$mascota)}}" method="POST" style="display: inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger"  type="submit" onclick="return confirm('Eliminar mascota?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
</div>
</section>
</div>
<!--hast aca-->

@endsection
