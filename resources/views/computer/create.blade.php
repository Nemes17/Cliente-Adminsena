@extends('layouts.app')

@section('content')
    <h2>Formulario Computador</h2>
<div class="card shadow p-4">
    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('computer.store') }}" method="POST">
    @csrf

    <label>Brand:<br>
        <input type="text" name="brand" class="form-control" required>
    </label><br>

    <label>Number:<br>
        <input type="number" name="number" class="form-control" required>
    </label><br>

    <label>Ambiente:<br>
        <select name="environment_id" class="form-control">
            <option value="">-- Seleccionar --</option>
            @foreach($environments as $environment)
                <option value="{{ $environment['id'] }}">{{ $environment['name'] }}</option>
            @endforeach
        </select>
    </label><br><br>
        <button type="submit" class="btn btn-success" onclick="this.disabled=true; this.form.submit();">
         Guardar Computador
        </button>
        <a href="{{ route('computer.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    </div>
  @endsection