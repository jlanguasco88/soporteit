@extends('layout.plantilla')

@section('content')
<h1>Cambios de Toner</h1>

<a href="{{ route('cambios.create') }}"  class="btn btn-primary">Registrar nuevo cambio</a><br><br>

<!-- Formulario para seleccionar fechas -->
<form action="{{ route('cambios.filtrar') }}" method="POST" class="mb-4">
@csrf
        <div class="row">
            <div class="col-md-4">
                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ old('fecha_inicio', $fecha_inicio) }}">
            </div>
            <div class="col-md-4">
                <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ old('fecha_fin', $fecha_fin) }}">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Filtrar</button>
            </div>
        </div>
    </form>
    <!-- Botón para limpiar los filtros -->
    <form action="{{ route('cambios.index') }}" method="GET" class="mb-4">
        <button type="submit" class="btn btn-secondary">Limpiar Filtros</button>
    </form>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Impresora</th>
            <th>Ubicación</th>
            <th>Toner</th>
            <th>Contador</th>
            <th>Motivo</th>
            <th>Páginas impresas</th>
            <th>Días duración</th>
            <th>Historial</th>
            
        </tr>
    </thead>
    <tbody>
        
            @foreach($impresoras as $impresora)
                    @php $ultimo = $impresora->cambios->first(); @endphp
                    <tr>
                        <td>{{ $ultimo?->fecha_cambio ? \Carbon\Carbon::parse($ultimo->fecha_cambio)->format('d/m/Y') : '-' }}</td>
                        <td>{{ $impresora->modelo }}</td>
                        <td>{{ $impresora->ubicacion ?? '-' }}</td>
                        <td>{{ $ultimo?->toner->modelo ?? '-' }}</td>
                       
                        <td>{{ $ultimo?->contador_paginas ?? '-' }}</td>
                        <td>{{ $ultimo?->motivo ?? '-' }}</td>
                        <td>{{ $ultimo?->paginas_impresas ?? '-' }}</td>
                        <td>{{ $ultimo?->duracion_dias ?? '-' }}</td>
                       
                        <td class="text-center">
                            <a href="{{ route('cambios.historial', $impresora->id) }}" class="btn btn-sm btn-outline-primary" title="Ver historial">
                                <i class="fas fa-list"></i>
                            </a>

                            <a href="{{ route('cambios.create', ['impresora_id' => $impresora->id]) }}" class="btn btn-sm btn-danger" title="Registrar cambio">
                                <i class="fas fa-tint"></i>
                            </a>
              
                        </td>
                    </tr>
            @endforeach
   
    </tbody>
</table>
@endsection
