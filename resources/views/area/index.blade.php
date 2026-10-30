@extends('layouts.app')

@section('content')

<h1>Lista de Áreas</h1>
<a href="{{ url('/area/create') }}" class="btn btn-primary mb-3">+ Agregar Área</a>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Name</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
     <tbody>
       @foreach($areas as $area)
<tr>
    <td>{{ $area['id'] }}</td>
<td>
        @if(!empty($area['imagen_url']))
            <img src="{{ $area['imagen_url'] }}" alt="{{ $area['name'] }}" style="width: 70px; height: 70px; object-fit: cover;" class="rounded">
        @else
            <span class="text-muted">Sin imagen</span>
        @endif
    </td>
    <td>{{ $area['name'] }}</td>
    <td>
        <a href="{{ route('area.show', $area['id']) }}" class="btn btn-info btn-sm">Ver</a>
        <a href="{{ route('area.edit', $area['id']) }}" class="btn btn-warning btn-sm">Editar</a>
        <form action="{{ route('area.destroy', $area['id']) }}" method="POST" style="display:inline">
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