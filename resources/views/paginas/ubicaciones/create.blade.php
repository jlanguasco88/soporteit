@extends('layout.plantilla')

@section('content')
<div class="container">
        <h1>Registrar Ubicación</h1>
        <form action="{{ route('ubicaciones.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nombreRed" class="form-label">Nombre Red</label>
                <input type="text" name="nombreRed" class="form-control">
            </div>
            <div class="mb-3">
                <label for="grupoRed" class="form-label">Grupo Red</label>
                <input type="text" name="grupoRed" class="form-control">
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" class="form-control" required>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="ip" class="form-label">IP</label>
                <input type="text" name="ip" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Registrar</button>
        </form>
    </div>
@endsection