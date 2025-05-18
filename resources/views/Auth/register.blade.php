<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('css/Auth/register.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: #f4f4f4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 bg-left"></div>
            <div class="col-md-6">
                <div class="row mt-5">
                    <div class="col-md-11 mb-4 mx-auto">
                        <h1 class="text-center mb-4">Registrarse</h1>
                        <form method="POST" action="{{ route('usuario.registrar.guardar') }}">
                            @csrf {{-- Evitar errores de seguridad --}}

                            {{-- Nombre 1 / Nombre 2 --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="has-validation mb-4 ">
                                        <div class="form-floating">
                                            <input type="text" name="nombre1" value="{{ old('nombre1') }}"
                                                onkeydown="soloLetras(event)" maxlength="15"
                                                class="form-control
                                        @error('nombre1') is-invalid @enderror
                                        {{ session('error') ? 'is-invalid' : '' }}"
                                                id="txtNombre1" placeholder="Nombre 1" required>
                                            <label for="txtNombre1">Nombre 1:</label>
                                        </div>
                                        @error('nombre1')
                                            <div class="ms-2 form-text text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="has-validation mb-4 ">
                                        <div class="form-floating">
                                            <input type="text" name="nombre2" value="{{ old('nombre2') }}"
                                                class="form-control" id="txtNombre2" placeholder="Nombre 2"
                                                onkeydown="soloLetras(event)" maxlength="15">
                                            <label for="txtNombre2">Nombre 2 (Opcional):</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Apellido 1 / Apellido 2 --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="has-validation mb-4 ">
                                        <div class="form-floating">
                                            <input type="text" name="apellido1" value="{{ old('apellido1') }}"
                                                onkeydown="soloLetras(event)" maxlength="15"
                                                class="form-control 
                                        @error('apellido1') is-invalid @enderror
                                        {{ session('error') ? 'is-invalid' : '' }}"
                                                id="txtApellido1" placeholder="Apellido 1" required>
                                            <label for="txtApellido1">Apellido 1:</label>
                                        </div>
                                        @error('apellido1')
                                            <div class="ms-2 form-text text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="has-validation mb-4 ">
                                        <div class="form-floating">
                                            <input type="text" name="apellido2" value="{{ old('apellido2') }}"
                                                onkeydown="soloLetras(event)" maxlength="15"
                                                class="form-control 
                                        @error('apellido2') is-invalid @enderror
                                        {{ session('error') ? 'is-invalid' : '' }}"
                                                id="txtApellido2" placeholder="Apellido 2" required>
                                            <label for="txtApellido2">Apellido 2:</label>
                                        </div>
                                        @error('apellido2')
                                            <div class="ms-2 form-text text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Tipo Identificacion / Identificacion --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select required name="id_tipo_identificacion"
                                            class="form-select
                                        @error('id_tipo_identificacion') is-invalid @enderror
                                        {{ session('error') ? 'is-invalid' : '' }}"
                                            id="slcTipo_identificacion" aria-label="Tipo de identificacion">
                                            <option selected disabled>Selecciona una opción</option>
                                            @foreach ($tipos_identificacion as $tp)
                                                <option value="{{ $tp->id_tipo_identificacions }}"
                                                    {{ old('id_tipo_identificacion') == $tp->id_tipo_identificacions ? 'selected' : '' }}>
                                                    {{ $tp->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="slcTipo_identificacion">Tipo de identificación:</label>
                                        @error('id_tipo_identificacion')
                                            <div class="ms-2 form-text text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="has-validation mb-4 ">
                                        <div class="form-floating">
                                            <input type="text" name="identificacion"
                                                value="{{ old('identificacion') }}"
                                                onkeydown="bloquearCaracteresEspeciales(event)" maxlength="20"
                                                class="form-control
                                        @error('identificacion') is-invalid @enderror
                                        {{ session('error') ? 'is-invalid' : '' }}"
                                                id="txtIdentificacion" placeholder="Identificacion 2" required>
                                            <label for="txtIdentificacion">Identificación:</label>
                                        </div>
                                        @error('identificacion')
                                            <div class="ms-2 form-text text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Correo --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="has-validation mb-4 ">
                                        <div class="form-floating">
                                            <input type="text" name="email" value="{{ old('email') }}"
                                                onkeydown="bloquearEspacios(event)" maxlength="150"
                                                class="form-control 
                                        @error('email') is-invalid @enderror
                                        {{ session('error') ? 'is-invalid' : '' }}"
                                                id="input-email" placeholder="Correo Electronico" required>
                                            <label for="input-email">Correo Electronico</label>
                                        </div>
                                        @error('email')
                                            <div class="ms-2 form-text text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Contraseña --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4 has-validation">
                                        <div class="input-group">
                                            <div class="form-floating">
                                                <input type="password" name="contrasena"
                                                    value="{{ old('contrasena') }}"
                                                    onkeydown="bloquearEspacios(event)" maxlength="100"
                                                    class="form-control 
                                            @error('contrasena') is-invalid @enderror 
                                            {{ session('error') ? 'is-invalid' : '' }}"
                                                    id="input-password" placeholder="Contraseña" required>
                                                <label for="input-password">Contraseña</label>
                                            </div>
                                            <a class="input-group-text btn btn-dark d-flex align-items-center"
                                                onclick="btn_password()">
                                                <i class="fa-solid fa-eye-slash"></i>
                                            </a>
                                        </div>
                                        @error('contrasena')
                                            <div class="ms-2 form-text text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Telefono / Direccion --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="has-validation mb-4 ">
                                        <div class="form-floating">
                                            <input type="number" min="0" maxlength="15" name="telefono"
                                                value="{{ old('telefono') }}" onkeydown="soloNumeros(event)"
                                                class="form-control 
                                        @error('telefono') is-invalid @enderror
                                        {{ session('error') ? 'is-invalid' : '' }}"
                                                id="txtTelefono" placeholder="Telefono" required>
                                            <label for="txtTelefono">Telefono:</label>
                                        </div>
                                        @error('telefono')
                                            <div class="ms-2 form-text text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="has-validation mb-4 ">
                                        <div class="form-floating">
                                            <input type="text" name="direccion" value="{{ old('direccion') }}"
                                                maxlength="70"
                                                class="form-control 
                                        @error('direccion') is-invalid @enderror
                                        {{ session('error') ? 'is-invalid' : '' }}"
                                                id="txtDireccion" placeholder="Direccion" required>
                                            <label for="txtDireccion">Direccion:</label>
                                        </div>
                                        @error('direccion')
                                            <div class="ms-2 form-text text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-1 text-center">
                                <button type="submit" class="btn btn-warning col-md-5">Crear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success') || session('error'))
            <div class="position-fixed bottom-0 start-0 p-3" style="z-index: 9999">
                <div id="liveToast"
                    class="toast align-items-center text-white {{ session('success') ? 'bg-success' : 'bg-danger' }} border-0"
                    role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('success') ?? session('error') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toastEl = document.getElementById('liveToast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl, {
                    delay: 3000
                });
                toast.show();
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js"
        integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/Auth/auth.js') }}"></script>
</body>

</html>
