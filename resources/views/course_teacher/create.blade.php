@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #3DAE2B;">
                <h4 class="mb-0">Asignar Instructor a Curso</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('course_teacher.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Curso</label>
                        <select name="course_id" class="form-select" required>
                            <option value="">-- Seleccionar --</option>
                            @foreach($courses as $course)
                                <option value="{{ $course['id'] }}">{{ $course['course_number'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Instructor</label>
                        <select name="teacher_id" class="form-select" required>
                            <option value="">-- Seleccionar --</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher['id'] }}">{{ $teacher['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('course_teacher.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success" onclick="this.disabled=true; this.form.submit();">Asignar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
