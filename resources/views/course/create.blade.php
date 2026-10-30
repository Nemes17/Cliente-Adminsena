@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #3DAE2B;">
                <h4 class="mb-0">Registrar Curso</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('course.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Número de Ficha</label>
                        <input type="number" name="course_number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="day" class="form-control" required>
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
                        <label class="form-label">Centro de Formación</label>
                        <select name="training_center_id" class="form-select">
                            <option value="">-- Seleccionar --</option>
                            @foreach($trainingCenters as $center)
                                <option value="{{ $center['id'] }}">{{ $center['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ambiente</label>
                        <select name="environment_id" class="form-select">
                            <option value="">-- Seleccionar --</option>
                            @foreach($environments as $environment)
                                <option value="{{ $environment['id'] }}">{{ $environment['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Oferta (Programa)</label>
                        <select name="offer_id" class="form-select">
                            <option value="">-- Seleccionar --</option>
                            @foreach($offers as $offer)
                                <option value="{{ $offer['id'] }}">{{ $offer['name'] }} ({{ $offer['level'] == 'tecnologo' ? 'Tecnólogo' : 'Técnico' }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cupo máximo de aprendices</label>
                        <input type="number" name="quota" class="form-control" min="0">
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success" onclick="this.disabled=true; this.form.submit();">Guardar Curso</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
