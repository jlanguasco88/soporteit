@extends('layout.plantilla')

@section('content')
<h1>Listado de Toners</h1>
<a href="{{ route('toners.create') }}" class="btn btn-primary">Nuevo Toner</a>

<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
          
            <th>Modelo</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($toners as $toner)
            <tr>
                
                <td>{{ strtoupper($toner->modelo) }}</td>
                <td>{{ $toner->disponibles }}</td>
                <td>
                    <a href="{{ route('toners.modelo', ['modelo' => $toner->modelo]) }}" class="btn btn-sm btn-outline-primary" title="Ver listado">
                        <i class="fas fa-list"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection