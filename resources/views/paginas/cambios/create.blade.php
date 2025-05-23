@extends('layout.plantilla')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Registrar Cambio de Toner</h1>

    <form action="{{ route('cambios.store') }}" method="POST" class="card p-4 shadow rounded">
        @csrf

        <div class="mb-3">
            <label for="impresora_id" class="form-label">Impresora:</label>
            <select name="impresora_id" id="impresora_id" class="form-select" required>
                <option value="">Seleccione una impresora</option>
                @foreach($impresoras as $impresora)
                    <option value="{{ $impresora->id }}" {{ old('impresora_id', $impresoraSeleccionada ?? '') == $impresora->id ? 'selected' : '' }}>
                        {{ $impresora->modelo }} - {{ $impresora->ubicacion }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="toner_id" class="form-label">Toner:</label>
            <select name="toner_id" id="toner_id" class="form-select" required>
                <option value="">Seleccione un toner</option>
                @foreach($toners as $toner)
                    <option value="{{ $toner->id }}">
                        {{ strtoupper($toner->modelo) }} - {{ $toner->codigo_unico }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_cambio" class="form-label">Fecha de cambio:</label>
            <input type="date" name="fecha_cambio" id="fecha_cambio" class="form-control" value="{{ old('fecha_cambio', now()->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="contador_paginas" class="form-label">Contador de páginas:</label>
            <input type="number" name="contador_paginas" id="contador_paginas" class="form-control" min="0" required>
        </div>

        <div class="mb-3">
            <label for="motivo" class="form-label">Motivo del cambio:</label>
            <select name="motivo" required>
                <option value="Toner bajo">Toner bajo</option>
                <option value="Falla">Falla</option>
                <option value="Otro">Otro</option>
            </select><br>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-success">Guardar Cambio</button>
            <a href="{{ route('cambios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection