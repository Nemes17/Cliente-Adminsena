@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header text-white" style="background-color: #3DAE2B;">
                <h4 class="mb-0">Registrar Centro de Formación</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('training_center.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ubicación</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Imagen</label>
                        <input type="file" name="imagen" class="form-control" accept="image/*">
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('training_center.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success" onclick="this.disabled=true; this.form.submit();">Guardar Centro de Formación</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
