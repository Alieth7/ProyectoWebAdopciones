<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\PecheraController;

use App\Http\Controllers\ExportarController;


use App\Http\Controllers\Controller;

/*no olvidar indexar los controladores que usemos*/
use App\Http\Controllers\ControllerVistaTemplate;
use App\Http\Controllers\ControllerAdmin;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/


Route::get('/', function () {
    return view('welcome');
});

/*-------------------------*/

/*ruta login*/
Route::get('/login',[AuthController::class,'showLogin'])-> name('login');
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout'])->name('logout');


/*Pagina protegida que autentica(por Auth) por rol y estan protegidas
  ruta para admin - es mejor nombrar las rutas con ALIAS PARA QUE SEAN RECONOCIDAS*/
  
Route::middleware(['auth','rol:admin'])->group(function(){
    Route::get('/admin/dashboard',function(){
        return view('admin.dashboard');
    })->name('admin.dashboard'); //alias a toda la ruta

    /**Rutas de cruds*/
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('mascota', MascotaController::class);
    Route::resource('pechera',PecheraController::class);

    /**Rutas de reportes*/
    Route::get('/exportar/usuarios/pdf',[ExportarController::class,'exportarPdfUsuarios'])->name('exportar.usuarios.pdf');
    Route::get('/exportar/mascotas/pdf',[ExportarController::class,'exportarPdfMascotas'])->name('exportar.mascotas.pdf');
    Route::get('/exportar/pecheras/pdf',[ExportarController::class,'exportarPdfPecheras'])->name('exportar.pecheras.pdf');

    });
    

/*ruta para usuario coordinador 'trabajador'*/
Route::middleware(['auth','rol:coord'])->group(function(){
    Route::get('/coord/dashboard', function(){
        return view('coord.dashboard');
    })->name('coord.dashboard');
    /*rutas pertenecientes a coordinador*/
});

/*ruta para usuario comun*/
Route::middleware(['auth','rol:usuario'])->group(function(){
    Route::get('/usuario/dashboard',function(){
        return view('usuario.dashboard');
    })->name('usuario.dashboard');


/*rutas pertenecientes a usuario o adoptante*/

});

