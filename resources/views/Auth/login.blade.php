<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/Auth/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: #f4f4f4">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-6">
                <div class="row d-flex min-vh-100 align-items-center justify-content-center">
                    <div class="col-md-9 mx-auto">
                        <h1 class="text-center mb-4">Login</h1>
                        <form method="POST" action="{{ route('login.validar') }}">
                            @csrf {{-- Evitar errores de seguridad --}}
                            <div class="has-validation mb-4 ">
                                <div class="form-floating">
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        class="form-control 
                                        @error('email') is-invalid @enderror
                                        {{ session('error') ? 'is-invalid' : '' }}"
                                        id="input-email" placeholder="Correo Electronico" required
                                        onkeydown="bloquearEspacios(event)">
                                    <label for="input-email">Correo Electronico</label>
                                </div>
                                @error('email')
                                    <div class="ms-2 form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-1 has-validation">
                                <div class="input-group">
                                    <div class="form-floating">
                                        <input type="password" name="contrasena" value="{{ old('contrasena') }}"
                                            class="form-control 
                                            @error('contrasena') is-invalid @enderror 
                                            {{ session('error') ? 'is-invalid' : '' }}"
                                            id="input-password" placeholder="Contraseña" required
                                            onkeydown="bloquearEspacios(event)">
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
                            <div class="mb-4">
                                <p><a class="ms-2" href="{{ route('usuario.registrar.form') }}">¿No tienes cuenta?
                                        Registrate aqui</a></p>
                            </div>

                            <div class="mb-1 text-center">
                                <button type="submit" class="btn btn-warning col-md-5">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 bg-right"></div>
        </div>

        @if (session('success') || session('error'))
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
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
