<?php
 
namespace App\Http\Controllers;

use App\Models\Mascota;
//modelo de las tablas relacionadas a mascota
use App\Models\Raza;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class MascotaController extends Controller
{
    /**
     * with carga los datos de la relacion(carga la relacion)
     * cuando se tienen tablas relacionadas se debe cargar esa relacion con with('otra tabla')->get();
     */
    public function index()
    {
        /**$mascotas =Mascota::all(); */ 
        $mascotas = Mascota::with('razas')->get(); 
        return view('mascota.index',compact('mascotas'));
        /**mascotas tabla */ 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mascota.crear');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre'        =>'required|string|max:30',
            'edad'          =>'required|numeric',
            'color'         =>'required|string|max:35',
            'peso'          =>'required|numeric',
            'tamanio'       =>'required|in:pequeño,mediano,grande',
            'esterilizado'  =>'boolean',
            'cuidado_especial'=>'nullable|string|max:1500',
            'comportamiento'=>'nullable|string|max:255',
            'url_foto'      =>'required', /**|url*/ 
            'estado'        =>'required|in:disponible,no_disponible,en_tratamiento,en_proceso,adoptado',
            'id_raza'       =>'required|exists:razas,id', /**mejorar*/ 
        ],[
             
            'nombre.required' => 'El nombre del animal es obligatorio.',
            'nombre.string'   => 'El nombre solo puede contener texto.',
            'nombre.max'      => 'El nombre NO debe superar los 30 caracteres.',

            'edad.required' => 'La edad es obligatoria.',
            'edad.numeric'  => 'La edad debe ser un número válido.',

            'color.required' => 'El color es obligatorio.',
            'color.string'   => 'El color solo puede contener texto.',
            'color.max'      => 'El color NO debe superar los 35 caracteres.',

            'peso.required' => 'El peso es obligatorio.',
            'peso.numeric'  => 'El peso debe ser un valor numérico.',

            'tamanio.required' => 'Debe seleccionar un tamaño.',
            'tamanio.in'       => 'El tamaño seleccionado no es válido.',

            'esterilizado.boolean' => 'El valor de esterilización debe ser verdadero o falso.',

            'cuidado_especial.string' => 'El campo de cuidado especial debe ser texto.',
            'cuidado_especial.max'    => 'El campo de cuidado especial no debe exceder 1500 caracteres.',

            'comportamiento.string' => 'El comportamiento debe ser texto.',
            'comportamiento.max'    => 'El comportamiento no debe exceder 255 caracteres.',

            'url_foto.required' => 'Debe proporcionar una imagen o URL válida.',
           /** url_foto (según el tipo)
           * 'url_foto.url'      => 'La URL de la foto no es válida.',
           *'url_foto.image'    => 'El archivo debe ser una imagen válida.',
           * 'url_foto.mimes'    => 'La imagen debe ser de tipo: jpeg, jpg, png o webp.',
           * 'url_foto.max'      => 'La imagen no debe ser mayor a 2 MB.',*/ 
   
            'estado.required' => 'Debe seleccionar un estado.',
            'estado.in'       => 'El estado seleccionado no es válido.',

            'id_raza.required' => 'Debe seleccionar una raza.',
            'id_raza.exists'   => 'La raza seleccionada no existe en la base de datos.',

        ]);

        Mascota::create([
            'nombre'        =>$request->nombre,
            'edad'          =>$request->edad,
            'color'         =>$request->color,
            'peso'          =>$request->peso,
            'tamanio'       =>$request->tamanio,
            'esterilizado'  =>$request->esterilizado,
            'cuidado_especial'=>$request->cuidado_especial,
            'comportamiento'=>$request->comportamiento,
            'url_foto'      =>$request->url_foto,
            'estado'        =>$request->estado,
            'id_raza'       =>$request->id_raza,
        ]);
        /**  una vez creada lo redigiremos al index, la lista de mascotas*/
        return redirect()->route('mascota.index')->with('success','Mascota creada.');
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
        $mascota = Mascota::findOrFail($id);
        return view('mascota.editar',compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id ) /** Mascota $mascota */
    {
        /**debe validar los datos que se actualizan tambien corregir */
        $mascota = Mascota::findOrFail($id);
    
        $request->validate([
            'nombre'        =>'required|string|max:30',
            'edad'          =>'required|numeric',
            'color'         =>'required|string|max:35',
            'peso'          =>'required|numeric',
            'tamanio'       =>'required|in:pequeño,mediano,grande',
            'esterilizado'  =>'boolean',
            'cuidado_especial'=>'nullable|string|max:1500',
            'comportamiento'=>'nullable|string|max:255',
            'url_foto'      =>'nullable',/**mismo de arriba */
            'estado'        =>'required|in:disponible,no_disponible,en_tratamiento,en_proceso,adoptado',
            'id_raza'       =>'required|exists:razas,id',
        ],[
            
            'nombre.required' => 'El nombre del animal es obligatorio.',
            'nombre.string'   => 'El nombre solo puede contener texto.',
            'nombre.max'      => 'El nombre NO debe superar los 30 caracteres.',

            'edad.required' => 'La edad es obligatoria.',
            'edad.numeric'  => 'La edad debe ser un número válido.',

            'color.required' => 'El color es obligatorio.',
            'color.string'   => 'El color solo puede contener texto.',
            'color.max'      => 'El color NO debe superar los 35 caracteres.',

            'peso.required' => 'El peso es obligatorio.',
            'peso.numeric'  => 'El peso debe ser un valor numérico.',

            'tamanio.required' => 'Debe seleccionar un tamaño.',
            'tamanio.in'       => 'El tamaño seleccionado no es válido.',

            'esterilizado.boolean' => 'El valor de esterilización debe ser verdadero o falso.',

            'cuidado_especial.string' => 'El campo de cuidado especial debe ser texto.',
            'cuidado_especial.max'    => 'El campo de cuidado especial no debe exceder 1500 caracteres.',

            'comportamiento.string' => 'El comportamiento debe ser texto.',
            'comportamiento.max'    => 'El comportamiento no debe exceder 255 caracteres.',

            'url_foto.required' => 'Debe proporcionar una imagen o URL válida.',
           /** url_foto (según el tipo)
           * 'url_foto.url'      => 'La URL de la foto no es válida.',
           *'url_foto.image'    => 'El archivo debe ser una imagen válida.',
           * 'url_foto.mimes'    => 'La imagen debe ser de tipo: jpeg, jpg, png o webp.',
           * 'url_foto.max'      => 'La imagen no debe ser mayor a 2 MB.',*/ 

            'estado.required' => 'Debe seleccionar un estado.',
            'estado.in'       => 'El estado seleccionado no es válido.',

            'id_raza.required' => 'Debe seleccionar una raza.',
            'id_raza.exists'   => 'La raza seleccionada no existe en la base de datos.',

        ]);

            $mascota->nombre            = $request->nombre;
            $mascota->edad              = $request->edad;
            $mascota->color             = $request->color;
            $mascota->peso              = $request->peso;
            $mascota->tamanio           = $request->tamanio;
            $mascota->esterilizado      = $request->esterilizado;
            $mascota->cuidado_especial  = $request->cuidado_especial;
            $mascota->comportamiento    = $request->comportamiento;
            $mascota->estado            = $request->estado;
            $mascota->id_raza           = $request->id_raza;

            /**solo actualiza si se sube o especifica*/
            if ($request->filled('url_foto')) {
                $mascota->url_foto = $request->url_foto;
            }
            
        $mascota->update($request->all());

        return redirect()->route('mascota.index')->with('success','Mascota actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mascota $mascota)
    {
        $mascota->delete();
        return redirect()->route('mascota.index')->with('success','Mascota eliminada.');
    }
}
