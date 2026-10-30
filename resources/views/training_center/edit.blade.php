@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #3DAE2B;">
                <h4 class="mb-0">Editar Centro de Formación</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('training_center.update', $trainingCenter['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ $trainingCenter['name'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ubicación</label>
                        <input type="text" name="location" class="form-control" value="{{ $trainingCenter['location'] }}" required>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('training_center.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning" onclick="this.disabled=true; this.form.submit();">Actualizar Centro de Formación</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
