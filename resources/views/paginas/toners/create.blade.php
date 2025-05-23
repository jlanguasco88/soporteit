@extends('layout.plantilla')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Registrar Nuevo Toner</h1>

    <form action="{{ route('toners.store') }}" method="POST" class="card p-4 shadow rounded">
        @csrf

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo:</label>
            <select name="modelo" id="modelo" class="form-select" required>
                <option value="">Selecciona un modelo</option>
                @foreach($modelos as $modelo)
                    <option value="{{ $modelo->modelo }}">{{ strtoupper($modelo->modelo) }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" value="1" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado:</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="disponible">Disponible</option>
                <option value="instalado">Instalado</option>
                <option value="usado">Usado</option>
                <option value="dañado">Dañado</option>
            </select>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-success">Guardar Toner</button>
            <a href="{{ route('toners.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection