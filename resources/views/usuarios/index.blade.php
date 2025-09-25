@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar.sideadmin')
@endsection

@section('contenido')

<!--desde aca  pdf-->
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


<!--USAR NUESTRA TABLA TEMPLATE -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                 <h2>Lista de usuarios</h2>
                <a href="{{route('usuarios.create')}}" class="btn icon btn-primary"><i class="bi bi-pencil"></i>  Crear nuevo usuario </a>
                
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" >Dashboard</a></li> 
                        <li class="breadcrumb-item active" aria-current="page">Lista de usuarios</li>

                       
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
                <!--Modificado para que abra en nueva pestania y el controllador previsualice-->
                <a href="{{ route('exportar.usuarios.pdf') }}" class="btn btn-info" target="_blank">Exportar a PDF</a>
            </div>
            <div class="card-body">
<table class="table table-striped" id="table1">
    <thead>
        <tr>
            <th>Nombre de usuario</th>
            <th>Email</th><th>Rol</th>
            <th>Nombres</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Ci</th>
            <th>Nro Celular</th>
            <th>Sexo</th>
            <th>Direccion</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->nombre_usuario}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->rol_formatted}}</td><!--usa metodo en modelo-->
                <td>{{$usuario->nombres}}</td>
                <td>{{$usuario->ap_paterno}}</td>
                <td>{{$usuario->ap_materno}}</td>
                <td>{{$usuario->ci}}</td>
                <td>{{$usuario->nro_celular}}</td>
                <td>{{$usuario->sexo}}</td>
                <td>{{$usuario->direccion}}</td>
                <td>
                    <a href="{{route('usuarios.edit',$usuario)}}" class="btn icon icon-left btn-primary"> <i data-feather="edit"> </i>Editar</a>
                    
                    <br>
                    <form action="{{route('usuarios.destroy',$usuario)}}" method="POST" style="display: inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Eliminar usuario?')">
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

<!--hasta aca-->
@endsection
