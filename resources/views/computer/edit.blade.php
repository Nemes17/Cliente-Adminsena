@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #3DAE2B;">
                <h4 class="mb-0">Editar Computador</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('computer.update', $computer['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Marca</label>
                        <input type="text" name="brand" class="form-control" value="{{ $computer['brand'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Número</label>
                        <input type="number" name="number" class="form-control" value="{{ $computer['number'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ambiente</label>
                        <select name="environment_id" class="form-select">
                            <option value="">-- Seleccionar --</option>
                            @foreach($environments as $environment)
                                <option value="{{ $environment['id'] }}" @selected($computer['environment_id'] == $environment['id'])>{{ $environment['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('computer.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning" onclick="this.disabled=true; this.form.submit();">Actualizar Computador</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
