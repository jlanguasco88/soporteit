

@extends('layout.plantilla')
<?php 
                function formatearIP($ip) {
                    if (!$ip || !filter_var($ip, FILTER_VALIDATE_IP)) {
                        return '000.000.000.000'; // Valor por defecto si la IP es inválida
                    }
                
                    $segmentos = explode('.', $ip);
                    return sprintf('%03d.%03d.%03d.%03d', $segmentos[0], $segmentos[1], $segmentos[2], $segmentos[3]);
                     }
                ?>     
                   
@section('content')
    <div class="container">
        <h1>Listado de Ubicaciones</h1>
        <a href="{{ route('ubicaciones.create') }}" class="btn btn-primary">Nueva Ubicación</a>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    
                    <th>Usuario</th>
                    <th>Nombre Red</th>
                    <th>Grupo Red</th>
                    <th>IP</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ubicaciones as $ubicacion)
              <tr>
                        
                        <td>{{ $ubicacion->usuario }}</td>
                        <td>{{ $ubicacion->nombreRed }}</td>
                        <td>{{ $ubicacion->grupoRed }}</td>
                        <td>{{ formatearIP($ubicacion->ip) }}</td> <!-- Mostrar IP -->
                        <td>{{ $ubicacion->estado ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <a href="{{ route('ubicaciones.edit', $ubicacion->id) }}" class="btn btn-warning btn-sm">Editar</a>
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection