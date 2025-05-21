<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>

    <link rel="stylesheet" href="{{ asset('css/Components/navbar.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: #f4f4f4">
    @include('Components.navbar')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

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

    <div class="container py-5">
        <h1 class="text-center mb-4">Vehículos disponibles</h1>
        <div class="row">
            @foreach($vehiculos as $vehiculo)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    {{-- Imagen del vehículo --}}
                    @if($vehiculo->imagen)
                    <img src="{{ $vehiculo->imagen }}" class="card-img-top"
                        alt="Imagen de {{ $vehiculo->marca }} {{ $vehiculo->modelo }}"
                        style="height: 200px; object-fit: cover;">
                    @else
                    <img src="https://via.placeholder.com/400x200?text=Sin+Imagen" class="card-img-top" alt="Sin imagen"
                        style="height: 200px; object-fit: cover;">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $vehiculo->marca }} {{ $vehiculo->modelo }}</h5>
                        <p class="card-text">
                            <strong>Placa:</strong> {{ $vehiculo->placa }}<br>
                            <strong>Tipo:</strong> {{ $vehiculo->tipoVehiculo->descripcion ?? 'N/A' }}<br>
                            <strong>Propietario:</strong> {{ $vehiculo->propietario->usuario->nombre1 ?? 'N/A' }}<br>
                            <strong>Valor:</strong> ${{ number_format($vehiculo->valor_coche, 2) }}<br>
                            <strong>Disponible:</strong> {{ $vehiculo->disponible ? 'Sí' : 'No' }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
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
</body>

</html>