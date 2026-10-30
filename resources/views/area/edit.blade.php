@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #3DAE2B;">
                <h4 class="mb-0">Editar Área</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('area.update', $area['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ $area['name'] }}" required>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('area.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning" onclick="this.disabled=true; this.form.submit();">Actualizar Área</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
