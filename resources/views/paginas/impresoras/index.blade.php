@extends('layout.plantilla')

@section('content')
<h1>Listado de Impresoras</h1>
<a href="{{ route('impresoras.create') }}" class="btn btn-primary">Nueva Impresora</a>

<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Modelo</th>
            <th>Ubicación</th>
            <th>Descripción</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($impresoras as $impresora)
            <tr>
                <td>{{ $impresora->modelo }}</td>
                <td>{{ $impresora->ubicacion }}</td>
                <td>{{ $impresora->descripcion }}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>
@endsection