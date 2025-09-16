<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
class AuthController extends Controller
{
     public function showLogin()
    {
        return view('auth.login');
    }
    /**redireccionamos segun rol y autenticamos */
    public function login(Request $request)
    { 
        $credenciales=$request->only('email','password');

     if(Auth::attempt($credenciales)) {
       $request->session()->regenerate();
       $usuario=Auth::user();
        /**agregar y mejorar control para rol coord */

        if($usuario->rol==='admin'){
            return redirect()->intended('/admin/dashboard');
        }elseif($usuario->rol==='coord'){
            return redirect()->intended('/coord/dashboard');
        }else{
            return redirect()->intended('/usuario/dashboard');
        }
      }

      return back()->withErrors(['email'=>'Credenciales invalidas'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();
        return redirect('/login');
    }
} 