<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Models\Usuario;
use App\Models\Mascota;
use App\Models\Pechera;
use App\Models\Raza;
use Barryvdh\DomPDF\Facade\Pdf; 


class ExportarController extends Controller
{
    //filtrar los datos antes de enviarlos al PDF
    //$usuarios = User::select('name', 'email', 'created_at', 'role')->get();   
    public function exportarPdfUsuarios(){

    $usuarios = Usuario::all();
    $pdf = Pdf::loadView('exportar.usuarios-pdf', compact('usuarios'));
    //$pdf->setPaper('letter');
    $pdf->setPaper('letter','landscape'); // carta y horizontal
    return $pdf->stream('usuarios.pdf'); //para previsualizar
    //return $pdf->download('usuarios.pdf'); //descargar directamente
    } 

    public function exportarPdfMascotas(){
    $mascotas = Mascota::with('razas')->get();
    $pdf = Pdf::loadView('exportar.mascotas-pdf', compact('mascotas'));
    $pdf ->setPaper('letter','landscape');
    return $pdf->stream('mascotas.pdf');   
    }

    public function exportarPdfPecheras(){
    $pecheras = Pechera::all();
    $pdf = Pdf::loadView('exportar.pecheras-pdf', compact('pecheras'));
    $pdf ->setPaper('letter');
    return $pdf->stream('pecheras.pdf');
    }

}
