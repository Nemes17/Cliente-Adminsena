@extends('layouts.app')

@section('content')

<h1>Lista de Computadores</h1>
<a href="{{ route('computer.create') }}" class="btn btn-primary mb-3">+ Agregar Computador</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Number</th>
            <th>Ambiente</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($computers as $computer)
        <tr>
            <td>{{ $computer['id'] }}</td>
            <td>{{ $computer['brand'] }}</td>
            <td>{{ $computer['number'] }}</td>
            <td>{{ $computer['environment']['name'] ?? 'Sin asignar' }}</td>
            <td>
                <a href="{{ route('computer.show', $computer['id']) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('computer.edit', $computer['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('computer.destroy', $computer['id']) }}" method="POST" style="display:inline">
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