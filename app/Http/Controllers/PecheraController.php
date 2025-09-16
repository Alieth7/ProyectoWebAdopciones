<?php
namespace App\Http\Controllers;

use App\Models\Pechera;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class PecheraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pecheras= Pechera::all();
        return view('pechera.index', compact('pecheras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pechera.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'estado' =>'required|in:disponible,asignada,en_reparacion',
            
        ],
        /**mensajes validacion personalizados */
        );

        Pechera::create([
            'estado'    =>$request->estado,
        ]);

        return redirect()->route('pechera.index')->with('success','Pechera creada.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pechera = Pechera::findOrFail($id);
        return view('pechera.editar', compact('pechera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pechera $pechera)
    {
        //
        $request->validate([
            'estado' =>'required|in:disponible,asignada,en_reparacion',
        ]);

        $pechera->estado =$request->estado;

        $pechera->save();
        return redirect()->route('pechera.index')->with('success','Pechera actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pechera $pechera)
    {
        //
        $pechera->delete();
        return redirect()->route('pechera.index')->with('success','Pechera eliminada.');
    }
}
