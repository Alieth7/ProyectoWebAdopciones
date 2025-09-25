@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar.sideadmin')
@endsection

@section('contenido')

<!--desde aca es el codigo del pdf-->
@if(auth()->user()->rol ==='admin')
    <a href="{{route('admin.dashboard')}}">
        Volver al dashboard
    </a>
@endif


@if(session('success'))
    <p>{{session('success')}}</p>
@endif


<!--TABLA DEL TEMPLATE-->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h2>Lista de Pecheras</h2>
                <a href="{{route('pechera.create')}}" class="btn icon btn-primary"><i class="bi bi-pencil"></i>  Crear nueva pechera </a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}" >Dashboard</a></li> 
                        <li class="breadcrumb-item active" aria-current="page">Lista de pecheras</li>

                       
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
                <a href="{{route('exportar.pecheras.pdf')}}" class="btn btn-info" target="_blank">Exportar a PDF</a>
            </div>
            <div class="card-body">

        <table class="table table-striped" id="table1">
            <thead>
                <tr>

                    <th>Codigo pechera</th>
                     <th>Estado</th>
                     <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($pecheras as $pechera)
                    <tr>
                        <td>{{$pechera->codigo}}</td>
                        <td>{{$pechera->estado_formatted}}</td>
                        <td>
                            <a href="{{route('pechera.edit',$pechera)}}" class="btn icon icon-left btn-primary"> <i data-feather="edit"> </i>Editar </a>

                            <form action="{{route('pechera.destroy',$pechera)}}" method="POST" style="display: inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Eliminar pechera?')">

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
