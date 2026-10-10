<nav class="navbar navbar-expand-lg" style="background-color: #3DAE2B;">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('welcome') }}">
            <img src="{{ asset('logo-sena.png') }}" alt="SENA" height="50" class="me-2">
            <span class="text-white fw-bold">Admin SENA</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#"
                       data-bs-toggle="dropdown">Ver Registros</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('area.index') }}">Ver Áreas</a></li>
                        <li><a class="dropdown-item" href="{{ route('training_center.index') }}">Ver Centros</a></li>
                        <li><a class="dropdown-item" href="{{ route('environment.index') }}">Ver Ambientes</a></li>
                        <li><a class="dropdown-item" href="{{ route('computer.index') }}">Ver Computadores</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.index') }}">Ver Usuarios</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>