@extends('layout.plantilla')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Registrar Nueva Impresora</h1>

    <form action="{{ route('impresoras.store') }}" method="POST" class="card p-4 shadow rounded">
        @csrf

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo:</label>
            <input type="text" name="modelo" id="modelo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="serie" class="form-label">Número de serie:</label>
            <input type="text" name="serie" id="serie" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación:</label>
            <input type="text" name="ubicacion" id="ubicacion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado:</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="operativa">Operativa</option>
                <option value="en reparación">En reparación</option>
                <option value="dada de baja">Dada de baja</option>
            </select>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-success">Guardar Impresora</button>
            <a href="{{ route('impresoras.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection