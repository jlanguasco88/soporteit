@extends('layout.plantilla')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Resultados Filtrados de Cambios de Toner</h1>

    @if($cambios->isEmpty())
        <p>No se encontraron cambios para el rango de fechas seleccionado.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Impresora</th>
                    <th>Toner</th>
                    <th>Fecha de Cambio</th>
                    <th>Motivo</th>
                    <th>Contador de Páginas</th>
                    <th>Páginas Impresas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cambios as $cambio)
                    <tr>
                        <td>{{ $cambio->impresora->modelo }} - {{ $cambio->impresora->ubicacion }}</td>
                        <td>{{ $cambio->toner->modelo }} - {{ $cambio->toner->codigo_unico }}</td>
                        <td>{{ \Carbon\Carbon::parse($cambio->fecha_cambio)->format('d/m/Y') }}</td>
                        <td>{{ ucfirst($cambio->motivo) }}</td>
                        <td>{{ $cambio->contador_paginas }}</td>
                        <td>{{ $cambio->paginas_impresas ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="text-end">
        <a href="{{ route('cambios.index') }}" class="btn btn-secondary">Volver al listado de cambios</a>
    </div>
</div>
@endsection