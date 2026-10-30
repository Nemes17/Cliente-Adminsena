@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #3DAE2B;">
                <h4 class="mb-0">Editar Aprendiz</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('apprentice.update', $apprentice['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ $apprentice['name'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" name="email" class="form-control" value="{{ $apprentice['email'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular</label>
                        <input type="text" name="cell_number" class="form-control" value="{{ $apprentice['cell_number'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Curso</label>
                        <select name="course_id" class="form-select">
                            <option value="">-- Seleccionar --</option>
                            @foreach($courses as $course)
                                <option value="{{ $course['id'] }}" @selected($apprentice['course_id'] == $course['id'])>{{ $course['course_number'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Computador</label>
                        <select name="computer_id" class="form-select">
                            <option value="">-- Seleccionar --</option>
                            @foreach($computers as $computer)
                                <option value="{{ $computer['id'] }}" @selected($apprentice['computer_id'] == $computer['id'])>{{ $computer['brand'] }} - {{ $computer['number'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('apprentice.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning" onclick="this.disabled=true; this.form.submit();">Actualizar Aprendiz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
