@extends('layout.plantilla')

@section('content')
<h2>Historial de {{ $impresora->modelo }} - {{ $impresora->ubicacion }}</h2>



<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Toner</th>
            <th>Contador</th>
            <th>Motivo</th>
            <th>Páginas impresas</th>
            <th>Días de duración</th>
        </tr>
    </thead>
    <tbody>
        @foreach($impresora->cambios as $cambio)
            <tr>
                <td>{{ $cambio->fecha_cambio }}</td>
                <td>{{ $cambio->toner->codigo_unico }}</td>
                <td>{{ $cambio->contador_paginas }}</td>
                <td>{{ $cambio->motivo }}</td>
                <td>{{ $cambio->paginas_impresas ?? '-' }}</td>
                <td>{{ $cambio->duracion_dias ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="text-end">
    <a href="{{ route('cambios.index') }}" class="btn btn-secondary">Volver al listado de cambios</a>
</div>
@endsection
