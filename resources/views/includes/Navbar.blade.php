@php
    $inicio = route('home');

    if (session('user.rol') == 'instructor') {
        $inicio = route('teacher.home');
    }

    if (session('user.rol') == 'aprendiz') {
        $inicio = route('apprentice.home');
    }
@endphp

<nav class="navbar navbar-expand-lg" style="background-color: #3DAE2B;">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="{{ $inicio }}">
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
                    <a class="nav-link text-white" href="{{ $inicio }}">Home</a>
                </li>
                @if(session('user.rol') == 'aprendiz')
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('apprentice.ofertas') }}">Ofertas</a>
                </li>
                @elseif(session('user.rol') != 'instructor')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#"
                       data-bs-toggle="dropdown">Registrar</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/area/create">Área</a></li>
                        <li><a class="dropdown-item" href="/training_center/create">Centro de Formación</a></li>
                        <li><a class="dropdown-item" href="/environment/create">Ambiente</a></li>
                        <li><a class="dropdown-item" href="/offer/create">Oferta</a></li>
                        <li><a class="dropdown-item" href="/computer/create">Computador</a></li>
                        <li><a class="dropdown-item" href="/course/create">Curso</a></li>
                        <li><a class="dropdown-item" href="/teacher/create">Instructor</a></li>
                        <li><a class="dropdown-item" href="/apprentice/create">Aprendiz</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/course_teacher/create">Asignar Instructor a Curso</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#"
                       data-bs-toggle="dropdown">Ver Registros</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/area">Ver Áreas</a></li>
                        <li><a class="dropdown-item" href="/training_center">Ver Centros</a></li>
                        <li><a class="dropdown-item" href="/environment">Ver Ambientes</a></li>
                        <li><a class="dropdown-item" href="/offer">Ver Ofertas</a></li>
                        <li><a class="dropdown-item" href="/computer">Ver Computadores</a></li>
                        <li><a class="dropdown-item" href="/course">Ver Cursos</a></li>
                        <li><a class="dropdown-item" href="/teacher">Ver Instructores</a></li>
                        <li><a class="dropdown-item" href="/apprentice">Ver Aprendices</a></li>
                        <li><a class="dropdown-item" href="/user">Ver Usuarios</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/course_teacher">Ver Asignaciones</a></li>
                    </ul>
                </li>
                @endif
            </ul>
            <form action="{{ route('logout') }}" method="POST" class="ms-auto">
                @csrf
                <button type="submit" class="btn btn-light btn-sm">Cerrar sesión</button>
            </form>
        </div>
    </div>
</nav>