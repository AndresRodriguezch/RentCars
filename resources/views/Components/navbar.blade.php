<nav class="navbar navbar-expand-lg bg-warning" data-bs-theme="light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-car me-2"></i>RentCars</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="vr border border-black me-1"></div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Alquilar Vehiculos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Rentar Vehiculo</a>
                </li>
                @if (Auth::check() && Auth::user()->id_rol == 1)
                    <div class="vr border border-black ms-1 me-1"></div>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Usuarios
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark mt-3">
                            <li><a class="dropdown-item" href="{{ route('listarUsuarios') }}">Lista de usuarios</a></li>
                            <li><a class="dropdown-item" href="#">Agregar Usuario</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Vehiculos
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark mt-3">
                            <li><a class="dropdown-item" href="#">Lista de vehiculos</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown" data-bs-display="static">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-user me-2"></i>Perfil
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark mt-3 dropdown-menu-lg-end">
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <p class="text-center m-0 fw-semibold"><i class="fa-solid fa-user"></i>
                                    @if (Auth::check() && Auth::user()->id_rol == 1)
                                        Administrador
                                    @else
                                        Usuario
                                    @endif
                                </p>
                                @if (Auth::check())
                                    <p class="text-center fw-semibold text-capitalize">{{ Auth::user()->nombre1 }}
                                        {{ Auth::user()->apellido1 }}</p>
                                @endif
                                <hr class="dropdown-divider border border-white">
                                <li><a class="dropdown-item" href="#">Editar perfil</a></li>
                                <li><a class="dropdown-item" href="#">Mis vehiculos</a></li>
                                <li>
                                    <hr class="dropdown-divider border border-white">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </div>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
