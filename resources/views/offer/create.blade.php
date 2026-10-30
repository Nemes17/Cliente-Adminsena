@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #3DAE2B;">
                <h4 class="mb-0">Registrar Oferta</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('offer.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nombre del Programa</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nivel</label>
                        <select name="level" class="form-select" required>
                            <option value="">-- Seleccionar --</option>
                            <option value="tecnico">Técnico</option>
                            <option value="tecnologo">Tecnólogo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Área</label>
                        <select name="area_id" class="form-select">
                            <option value="">-- Seleccionar --</option>
                            @foreach($areas as $area)
                                <option value="{{ $area['id'] }}">{{ $area['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Duración (meses)</label>
                        <input type="number" name="duration_months" class="form-control" min="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <select name="status" class="form-select">
                            <option value="abierta">Abierta</option>
                            <option value="cerrada">Cerrada</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('offer.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success" onclick="this.disabled=true; this.form.submit();">Guardar Oferta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
