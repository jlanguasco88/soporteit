@extends('layout.plantilla')

@section('content')
<div class="container">
    <h3 class="mb-3">Toners del modelo: {{ strtoupper($modelo) }}</h3>

    <a href="{{ route('toners.index') }}" class="btn btn-secondary mb-3">← Volver</a>

    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Código Único</th>
                <th>Estado</th>
                <th>Fecha de Creación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($toners as $toner)
                <tr>
                    <td>{{ strtoupper($toner->codigo_unico) }}</td>
                    <td>{{ ucfirst($toner->estado) }}</td>
                    <td>{{ $toner->updated_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
