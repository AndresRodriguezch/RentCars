<?php

namespace App\Http\Controllers;

use App\Models\tipoIdentificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\usuario;

class UsuarioController extends Controller
{
    public function mostrar_formulario_registro()
    {
        $tipos_identificacion = TipoIdentificacion::where('estado', 1)->get();
        return view('Auth.register', compact('tipos_identificacion'));
    }

    public function mostrar_formulario_login()
    {
        return view('Auth.login');
    }

    public function listar_usuarios()
    {
        return view('Users.listaUsuarios', [
            'usuarios' => usuario::all()
        ]);
    }

    public function eliminar_usuario($id)
    {
        $usuario = usuario::findOrFail($id);
        $usuario->delete();

        return back()->with('success', 'Usuario eliminado correctamente');
    }

    public function registrar_usuario(Request $request)
    {
        $request->validate([
            'nombre1' => 'required|string|min:3',
            'nombre2' => 'nullable|string',
            'apellido1' => 'required|string|min:3',
            'apellido2' => 'required|string|min:3',
            'id_tipo_identificacion' => 'required|integer|exists:tipo_identificacions,id_tipo_identificacions',
            'identificacion' => 'required|string|min:7',
            'email' => 'required|email',
            'contrasena' => 'required|string|min:8',
            'telefono' => 'required|string|min:7',
            'direccion' => 'required|string|min:5',
        ], [
            'nombre1.required' => 'Por favor, ingresa tu primer nombre.',
            'nombre1.min' => 'El primer nombre debe tener al menos 3 caracteres.',
            'apellido1.required' => 'Por favor, ingresa tu primer apellido.',
            'apellido1.min' => 'El primer apellido debe tener al menos 3 caracteres.',
            'apellido2.required' => 'Por favor, ingresa tu segundo apellido.',
            'apellido2.min' => 'El segundo apellido debe tener al menos 3 caracteres.',
            'id_tipo_identificacion.required' => 'Selecciona un tipo de identificación.',
            'id_tipo_identificacion.integer' => 'El tipo de identificación debe ser un valor numérico.',
            'id_tipo_identificacion.exists' => 'El tipo de identificación seleccionado no es válido.',
            'identificacion.required' => 'Por favor, ingresa tu número de identificación.',
            'identificacion.min' => 'La identificación debe tener al menos 7 caracteres.',
            'identificacion.unique' => 'Esta identificación ya está registrada.',
            'email.required' => 'Por favor, ingresa tu correo electrónico.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'contrasena.required' => 'Por favor, ingresa la contraseña.',
            'contrasena.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'telefono.required' => 'Por favor, ingresa tu número de teléfono.',
            'telefono.min' => 'El teléfono debe tener al menos 7 caracteres.',
            'direccion.required' => 'Por favor, ingresa tu dirección.',
            'direccion.min' => 'La dirección debe tener al menos 5 caracteres.',
        ]);

        $usuarioExistente = Usuario::where('email', $request->email)
            ->orWhere('identificacion', $request->identificacion)
            ->first();

        if ($usuarioExistente) {
            return back()->with('error', 'Ya existe un usuario con este correo o número de identificación.')->withInput();
        }

        $usuario = Usuario::create([
            'nombre1' => $request->nombre1,
            'nombre2' => $request->nombre2,
            'apellido1' => $request->apellido1,
            'apellido2' => $request->apellido2,
            'id_tipo_identificacion' => $request->id_tipo_identificacion,
            'identificacion' => $request->identificacion,
            'email' => $request->email,
            'password' => Hash::make($request->contrasena),
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'id_rol' => 2,
        ]);

        return redirect()->route('login')->with('success', 'Usuario creado correctamente.');
    }

    public function iniciar_sesion(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'contrasena' => 'required|min:8',
        ], [
            'email.required' => 'Por favor, ingresa tu correo electrónico.',
            'email.email' => 'El correo electrónico no es válido.',
            'contrasena.required' => 'Por favor, ingresa la contraseña.',
            'contrasena.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);

        $credenciales = [
            'email' => $request->email,
            'password' => $request->contrasena,
        ];

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Inicio de sesión exitoso.');
        }

        return back()->with('error', 'Credenciales incorrectas')->withInput();
    }

    public function cerrar_sesion(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }
}
