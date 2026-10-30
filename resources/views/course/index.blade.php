@extends('layouts.app')

@section('content')

<h1>Lista de Cursos</h1>
<a href="{{ route('course.create') }}" class="btn btn-primary mb-3">+ Agregar Curso</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Course Number</th>
            <th>Day</th>
            <th>Área</th>
            <th>Centro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $course['id'] }}</td>
            <td>{{ $course['course_number'] }}</td>
            <td>{{ $course['day'] }}</td>
            <td>{{ $course['area']['name'] ?? 'Sin área' }}</td>
            <td>{{ $course['training_center']['name'] ?? 'Sin centro' }}</td>
            <td>
                <a href="{{ route('course.show', $course['id']) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('course.edit', $course['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('course.destroy', $course['id']) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Eliminar este registro?')">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
