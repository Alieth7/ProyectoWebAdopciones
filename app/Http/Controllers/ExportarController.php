<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Models\Usuario;
use Barryvdh\DomPDF\Facade\Pdf; 


class ExportarController extends Controller
{
    //filtrar los datos antes de enviarlos al PDF
    //$usuarios = User::select('name', 'email', 'created_at', 'role')->get();   
    public function exportarPDF(){

    $usuarios = Usuario::all();
    $pdf = Pdf::loadView('exportar.usuarios-pdf', compact('usuarios'));
    //$pdf->setPaper('letter');
    $pdf->setPaper('letter','landscape'); // carta y horizontal
    return $pdf->stream('usuarios.pdf'); //para previsualizar
    //return $pdf->download('usuarios.pdf'); //descargar directamente
    } 

}
