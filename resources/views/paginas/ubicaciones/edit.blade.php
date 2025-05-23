@extends('layout.plantilla')

@section('content')
<div class="container">
        <h1>Editar Ubicación</h1>
        <form action="{{ route('ubicaciones.update', $ubicacion->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control" value="{{ old('usuario', $ubicacion->usuario) }}" required>
            </div>
            <div class="mb-3">
                <label for="nombreRed" class="form-label">Nombre Red</label>
                <input type="text" name="nombreRed" class="form-control" value="{{ old('nombreRed', $ubicacion->nombreRed) }}">
            </div>
            <div class="mb-3">
                <label for="grupoRed" class="form-label">Grupo Red</label>
                <input type="text" name="grupoRed" class="form-control" value="{{ old('grupoRed', $ubicacion->grupoRed) }}">
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" class="form-control" required>
                    <option value="1" {{ $ubicacion->estado == 1 ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ $ubicacion->estado == 0 ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="ip" class="form-label">IP</label>
                <input type="text" name="ip" class="form-control" value="{{ old('ip', $ubicacion->ip) }}">
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
@endsection
