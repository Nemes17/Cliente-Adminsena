@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #3DAE2B;">
                <h4 class="mb-0">Editar Instructor</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('teacher.update', $teacher['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ $teacher['name'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" name="email" class="form-control" value="{{ $teacher['email'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Área</label>
                        <select name="area_id" class="form-select">
                            <option value="">-- Seleccionar --</option>
                            @foreach($areas as $area)
                                <option value="{{ $area['id'] }}" @selected($teacher['area_id'] == $area['id'])>{{ $area['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Centro de Formación</label>
                        <select name="training_center_id" class="form-select">
                            <option value="">-- Seleccionar --</option>
                            @foreach($trainingCenters as $center)
                                <option value="{{ $center['id'] }}" @selected($teacher['training_center_id'] == $center['id'])>{{ $center['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning" onclick="this.disabled=true; this.form.submit();">Actualizar Instructor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
