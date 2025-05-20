<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Auth.login');
})->name('login');
Route::post('/login', [UsuarioController::class, 'iniciar_sesion'])->name('login.validar');

Route::get('/registro', [UsuarioController::class, 'mostrar_formulario_registro'])->name('usuario.registrar.form');
Route::post('/registro', [UsuarioController::class, 'registrar_usuario'])->name('usuario.registrar.guardar');

Route::post('/logout', [UsuarioController::class, 'cerrar_sesion'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('Home.home');
    })->name('home');

    Route::get('/listarUsuarios', [UsuarioController::class, 'listar_usuarios'])->name('listarUsuarios');
    Route::delete('/listarUsuarios/{id}', [UsuarioController::class, 'eliminar_usuario'])->name('usuarios.eliminar');
});