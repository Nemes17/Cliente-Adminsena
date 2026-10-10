@extends('layouts.app')

@section('content')

<h1>Editar Computador</h1>

<form action="{{ route('computer.update', $computer['id']) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Brand:
        <br>
        <input type="text" name="brand" class="form-control"
               value="{{ $computer['brand'] }}" required>
    </label>
    <br><br>

    <label>Number:
        <br>
        <input type="number" name="number" class="form-control"
               value="{{ $computer['number'] }}" required>
    </label>
    <br><br>

    <label>Ambiente:
        <br>
        <select name="environment_id" class="form-control">
            <option value="">-- Seleccionar --</option>
            @foreach($environments as $environment)
                <option value="{{ $environment['id'] }}"
                    @selected(($computer['environment_id'] ?? null) == $environment['id'])>
                    {{ $environment['name'] }}
                </option>
            @endforeach
        </select>
    </label>
    <br><br>

    <button type="submit" class="btn btn-warning">Actualizar Computador</button>

    <a href="{{ route('computer.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection