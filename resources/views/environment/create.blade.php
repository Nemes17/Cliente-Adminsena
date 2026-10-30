@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #3DAE2B;">
                <h4 class="mb-0">Registrar Ambiente</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('environment.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Capacidad</label>
                        <input type="number" name="capacity" class="form-control" min="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Centro de Formación</label>
                        <select name="training_center_id" class="form-select">
                            <option value="">-- Seleccionar --</option>
                            @foreach($trainingCenters as $center)
                                <option value="{{ $center['id'] }}">{{ $center['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('environment.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success" onclick="this.disabled=true; this.form.submit();">Guardar Ambiente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
