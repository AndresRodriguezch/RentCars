<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>

    <link rel="stylesheet" href="{{ asset('css/Components/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Users/listarUsuario.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: #f4f4f4">
    @include('Components.navbar')
    <div class="container-fluid">
        <div class="row mt-4 mb-4">
            <div class="col-md-11 mx-auto">
                <h2 class="fw-semibold">Lista de Usuarios</h2>
                <div class="text-dark col-md-11 mx-auto">
                    <hr class="border-4 border-secondary mb-3 mt-3 rounded">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr class="text-center">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usuarios as $usuario)
                                                <tr class="text-center" id="fila-{{ $usuario->id_usuarios }}">
                                                    <td>{{ $usuario->id_usuarios }}</td>
                                                    <td>{{ $usuario->nombre1 }} {{ $usuario->apellido1 }}</td>
                                                    <td>{{ $usuario->email }}</td>
                                                    <td>
                                                        <button data-bs-placement="top" title="Ver más detalles"
                                                            class="btn-accion text-center btn btn-outline-primary rounded-5 mb-1"
                                                            type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapse-{{ $usuario->id_usuarios }}"
                                                            aria-expanded="false"
                                                            aria-controls="flush-collapse-{{ $usuario->id_usuarios }}">
                                                            <i class="fa-solid fa-chevron-down"></i>
                                                        </button>
                                                        <button data-id="{{ $usuario->id_usuarios }}"
                                                            data-url="{{ route('usuarios.eliminar', $usuario->id_usuarios) }}"
                                                            data-bs-placement="top" title="Eliminar Usuario"
                                                            class="btn-accion btn-eliminar text-center btn btn-outline-danger rounded-5 mb-1"
                                                            type="button">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="4" class="p-0 border-0">
                                                        <div class="accordion accordion-flush"
                                                            id="accordionFlushTable{{ $usuario->id_usuarios }}">
                                                            <div class="accordion-item">
                                                                <div id="flush-collapse-{{ $usuario->id_usuarios }}"
                                                                    class="accordion-collapse collapse"
                                                                    data-bs-parent="#accordionFlushTable{{ $usuario->id_usuarios }}">
                                                                    <div class="accordion-body p-0">
                                                                        <div class="row px-1 py-3">
                                                                            <div class="col-md-12">
                                                                                <div class="card"
                                                                                    style="background-color: #f4f4f4">
                                                                                    <div class="card-body text-center">
                                                                                        <h5 class="fw-semibold mb-3">
                                                                                            Información Adicional:</h5>
                                                                                        <span
                                                                                            class="badge text-black border border-secondary-subtle p-2 fw-normal">
                                                                                            <span
                                                                                                class="fst-normal fw-bold"><i
                                                                                                    class="fa-solid fa-phone"></i>
                                                                                                Telefono:</span>
                                                                                            {{ $usuario->telefono }}</span>
                                                                                        <span
                                                                                            class="badge text-black border border-secondary-subtle p-2 fw-normal">
                                                                                            <span
                                                                                                class="fst-normal fw-bold"><i
                                                                                                    class="fa-solid fa-location-dot"></i>
                                                                                                Direccion:</span>
                                                                                            {{ $usuario->direccion }}</span>
                                                                                        <span
                                                                                            class="badge text-black border border-secondary-subtle p-2 fw-normal">
                                                                                            <span
                                                                                                class="fst-normal fw-bold"><i
                                                                                                    class="fa-solid fa-id-card"></i>
                                                                                                Numero de
                                                                                                Identificación:</span>
                                                                                            {{ $usuario->identificacion }}</span>
                                                                                        <span
                                                                                            class="badge border
                                                                                        @if ($usuario->id_rol == 1) text-success border-success
                                                                                            @else
                                                                                            text-primary border-primary @endif p-2 fw-normal">
                                                                                            <span
                                                                                                class="fst-normal fw-bold">
                                                                                                @if ($usuario->id_rol == 1)
                                                                                                    <i
                                                                                                        class="fa-solid fa-user-tie"></i>
                                                                                                @else
                                                                                                    <i
                                                                                                        class="fa-solid fa-user"></i>
                                                                                                @endif
                                                                                                Rol:
                                                                                            </span>
                                                                                            @if ($usuario->id_rol == 1)
                                                                                                Administrador
                                                                                            @else
                                                                                                Usuario
                                                                                            @endif
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr class="border-1 border-secondary m-0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            // Tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
            tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Toast
            const toastEl = document.getElementById('liveToast');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl, {
                    delay: 3000
                });
                toast.show();
            }

            // SweetAlert -- Eliminar Usuarios/Administrador
            document.querySelectorAll('.btn-eliminar').forEach(button => {
                button.addEventListener('click', () => {
                    const userId = button.dataset.id;
                    const url = button.dataset.url;

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡Esta acción no se puede deshacer!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(url, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        _method: 'DELETE'
                                    })
                                })
                                .then(response => {
                                    if (response.ok) {
                                        const fila = document.getElementById(
                                            `fila-${userId}`);
                                        if (fila) fila.remove();

                                        Swal.fire(
                                            '¡Eliminado!',
                                            'El usuario fue eliminado correctamente.',
                                            'success'
                                        );
                                    } else {
                                        throw new Error('Error al eliminar');
                                    }
                                })
                                .catch(error => {
                                    Swal.fire(
                                        'Error',
                                        'No se pudo eliminar el usuario.',
                                        'error'
                                    );
                                });
                        }
                    });
                });
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js"
        integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
