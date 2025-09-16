<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

//use App\Http\Contr

class UsuarioController extends Controller
{
    /**
     * Vistas CRUD en carpeta usuarios views
     * Carpeta usuario views pertenecen al rol usuario(adoptante) 
     */
    public function index()
    {
        //mostar lista usuarios
        $usuarios =Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        //Mostrar el formulario de creacion
        return view ('usuarios.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Guardar los nuevos usuarios
        $request->validate([
            //atributos con min validacion
            'nombre_usuario'=>'required|string|max:25|unique:usuarios,nombre_usuario',
            'email'         =>'required|email|unique:usuarios,email',
            'password'      =>'required|confirmed|min:8',
            'rol'           =>'required|in:usuario,coord,admin',
            'nombres' => 'required|string|min:2|max:50|regex:/^[\pL\s\-\']+$/u',
            'ap_paterno'    =>'required|string|min:2|max:50|regex:/^[\pL\s\-\']+$/u',
            'ap_materno'    =>'nullable|string|min:2|max:50|regex:/^[\pL\s\-\']+$/u',
            'ci'            =>'required|max:50|unique:usuarios,ci',
            'nro_celular'   =>'required|digits:8', /**8 digitos */
            'sexo'          =>'required',
            'direccion'     =>'required|string|max:120'
            

        ],[
           
            'nombre_usuario.required' => 'El campo nombre de usuario es obligatorio.',
            'nombre_usuario.string'   => 'El campo debe contener solo letras.',
            'nombre_usuario.max'      => 'El nombre de usuario NO debe ser mayor a 25 caracteres.',
            'nombre_usuario.unique'   => 'El nombre de usuario ya esta registrado a una cuenta.',

            'email.required' => 'El correo electrónico es obligatorio.',  
            'email.email'    => 'El campo debe tener formato de un correo válido.',
            'email.unique'   => 'El correo ingresado ya está registrado a una cuenta.',

            'password.required'  => 'La contraseña es obligatoria.',
            'password.confirmed' => '¡Las contraseñas NO coinciden! >:(',
            'password.min'       => 'La contraseña debe tener mínimo 8 caracteres.',

            'rol.required' => 'Debe seleccionar un rol.',
            'rol.in'       => 'El rol seleccionado no es válido.',

            'nombres.required' => 'El campo nombres es obligatorio.',
            'nombres.string'   => 'El campo nombres debe contener solo letras.',
            'nombres.min'      => 'El nombre debe tener mínimo 2 caracteres.',
            'nombres.max'      => 'El nombre NO debe ser mayor a 50 caracteres.',
            'nombres.regex'    => 'El nombre solo puede contener letras, espacios, guiones y apóstrofes.',


            'ap_paterno.required' => 'El apellido paterno es obligatorio.',
            'ap_paterno.string'   => 'El apellido paterno debe contener solo letras.',
            'ap_paterno.min'      => 'El apellido paterno debe tener mínimo 2 caracteres.',
            'ap_paterno.max'      => 'El apellido paterno NO debe ser mayor a 50 caracteres.',
            'ap_paterno.regex'    => 'El apellido paterno solo puede contener letras, espacios, guiones y apóstrofes.',


            'ap_materno.string' => 'El apellido materno debe contener solo letras.',
            'ap_materno.min'    => 'El apellido materno debe tener mínimo 2 caracteres.',
            'ap_materno.max'    => 'El apellido materno NO debe ser mayor a 50 caracteres.',
            'ap_materno.regex'  => 'El apellido materno solo puede contener letras, espacios, guiones y apóstrofes.',


            'ci.required' => 'El campo CI es obligatorio.',
            'ci.max'      => 'El CI NO debe ser mayor a 50 caracteres.',
            'ci.unique'   => 'El CI ingresado ya esta registrado a otra cuenta.',


            'nro_celular.required'       => 'El número de celular es obligatorio.',
            'nro_celular.digits'         => 'El número de celular debe tener 8 dígitos.',


            'sexo.required' => 'Debe seleccionar un sexo.',


            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.string'   => 'La dirección debe contener solo texto.',
            'direccion.max'      => 'La dirección NO debe ser mayor a 120 caracteres.',
]);

        Usuario::create([
            
            'nombre_usuario' => $request->nombre_usuario,
            'email'          => $request->email,
            'password'       => $request->password,
            'rol'            => $request->rol,
            'nombres'        => $request->nombres,
            'ap_paterno'     => $request->ap_paterno,
            'ap_materno'     => $request->ap_materno,
            'ci'             => $request->ci,
            'nro_celular'    => $request->nro_celular,
            'sexo'           => $request->sexo,
            'direccion'      => $request->direccion,
        ]);

        return redirect()->route('usuarios.index')->with('success','Usuario creado.');
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
        //mostrar formulario para editar recurso
        $usuarios =  Usuario::findOrFail($id);
        return view('usuarios.editar', compact('usuarios'));  //usuarios de la tabla
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([

            'nombre_usuario' => 'required|string|max:25|unique:usuarios,nombre_usuario,' .$usuario->id,
            'email'         => 'required|email|unique:usuarios,email,' . $usuario->id,
            'password'      => 'nullable|min:8',
            'rol'           => 'required|in:usuario,coord,admin',
            'nombres'       => 'required|string|min:2|max:50|regex:/^[\pL\s\-\'"]+$/u',
            'ap_paterno'    => 'required|string|min:2|max:50|regex:/^[\pL\s\-\'"]+$/u',
            'ap_materno'    => 'nullable|string|max:50|regex:/^[\pL\s\-\'"]+$/u',
            'ci'            => 'required|max:50|unique:usuarios,ci,' . $usuario->id,
            'nro_celular'   => 'required|numeric|min:8',
            'sexo'          => 'required',
            'direccion'     => 'required|string|max:120',
  ],[
            
            'nombre_usuario.required' => 'El campo nombre de usuario es obligatorio.',
            'nombre_usuario.string'   => 'El campo debe contener solo letras.',
            'nombre_usuario.max'      => 'El nombre de usuario NO debe ser mayor a 25 caracteres.',
            'nombre_usuario.unique'   => 'El nombre de usuario ya esta registrado a una cuenta.',

  
            'email.required'     => 'El correo electrónico es obligatorio.',  
            'email.email'        => 'El campo debe tener formato de un correo válido.',
            'email.unique'       => 'El correo ingresado ya está registrado a una cuenta.',


            'password.required'  => 'La contraseña es obligatoria.',
            'password.confirmed' => '¡Las contraseñas NO coinciden! >:(',
            'password.min'       => 'La contraseña debe tener mínimo 8 caracteres.',

  
            'rol.required' => 'Debe seleccionar un rol.',
            'rol.in'       => 'El rol seleccionado no es válido.',

    
            'nombres.required' => 'El campo nombres es obligatorio.',
            'nombres.string'   => 'El campo nombres debe contener solo letras.',
            'nombres.min'      => 'El nombre debe tener mínimo 2 caracteres.',
            'nombres.max'      => 'El nombre NO debe ser mayor a 50 caracteres.',
            'nombres.regex'    => 'El nombre solo puede contener letras, espacios, guiones y apóstrofes.',


            'ap_paterno.required' => 'El apellido paterno es obligatorio.',
            'ap_paterno.string'   => 'El apellido paterno debe contener solo letras.',
            'ap_paterno.min'      => 'El apellido paterno debe tener mínimo 2 caracteres.',
            'ap_paterno.max'      => 'El apellido paterno NO debe ser mayor a 50 caracteres.',
            'ap_paterno.regex'    => 'El apellido paterno solo puede contener letras, espacios, guiones y apóstrofes.',


            'ap_materno.string' => 'El apellido materno debe contener solo letras.',
            'ap_materno.min'    => 'El apellido materno debe tener mínimo 2 caracteres.',
            'ap_materno.max'    => 'El apellido materno NO debe ser mayor a 50 caracteres.',
            'ap_materno.regex'  => 'El apellido materno solo puede contener letras, espacios, guiones y apóstrofes.',


            'ci.required'       => 'El campo CI es obligatorio.',
            'ci.max'            => 'El CI NO debe ser mayor a 50 caracteres.',
            'ci.unique'         => 'El CI ingresado ya esta registrado a otra cuenta.',

 
            'nro_celular.required' => 'El número de celular es obligatorio.',
            'nro_celular.digits'   => 'El número de celular debe tener 8 dígitos.',

            'sexo.required' => 'Debe seleccionar un sexo.',

            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.string'   => 'La dirección debe contener solo texto.',
            'direccion.max'      => 'La dirección NO debe ser mayor a 120 caracteres.',

    ]);
        /**en pdf esta comentado validaciones */
        $usuario->nombre_usuario =$request->nombre_usuario;
        $usuario->email         =$request->email;
        $usuario->password      =$request->password;/**no es obligatorio actualizar*/
        $usuario->rol           =$request->rol;
        $usuario->nombres       =$request->nombres;
        $usuario->ap_paterno    =$request->ap_paterno;
        $usuario->ap_materno    =$request->ap_materno;
        $usuario->ci            =$request->ci;
        $usuario->nro_celular   =$request->nro_celular;
        $usuario->sexo          =$request->sexo;
        $usuario->direccion     =$request->direccion;

        if($request->password){
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();
        return redirect()->route('usuarios.index')->with('success','Usuario actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //eliminar registro
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success','Usuario eliminado');
    }
}
