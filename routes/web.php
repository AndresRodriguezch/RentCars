<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;

// Ruta raíz ('/') que verifica si el usuario está autenticado.
// Si está autenticado, redirige a /home, si no, muestra el formulario de login.
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('home');
    }
    return view('Auth.login');
})->name('login');

Route::post('/login', [UsuarioController::class, 'iniciar_sesion'])->name('login.validar');

Route::get('/registro', [UsuarioController::class, 'mostrar_formulario_registro'])->name('usuario.registrar.form');
Route::post('/registro', [UsuarioController::class, 'registrar_usuario'])->name('usuario.registrar.guardar');

Route::middleware('auth')->group(function () {

    Route::post('/logout', [UsuarioController::class, 'cerrar_sesion'])->name('logout');

    // Ruta para mostrar la página principal /home
    // Se usa el controlador VehiculoController@index para cargar datos de vehículos
    Route::get('/home', [VehiculoController::class, 'index'])->name('home');

    Route::get('/listarUsuarios', [UsuarioController::class, 'listar_usuarios'])->name('listarUsuarios');
    Route::delete('/listarUsuarios/{id}', [UsuarioController::class, 'eliminar_usuario'])->name('usuarios.eliminar');
});
