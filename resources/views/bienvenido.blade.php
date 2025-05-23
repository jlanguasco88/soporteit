@extends('layout.plantilla')
@section('title', 'Bienvenido')

@section('content')


    <section class="content">
        <div class="box">
            <div class="box-body">
                <h3>Bienvenido</h3>
                <br>

                <h3>Sistema de control de Incidencias</h3>

                @if($toners_bajos->count())
                    <div class="alert alert-warning">
                        <strong>¡Atención!</strong> Los siguientes modelos de toner tienen menos de 3 unidades disponibles:
                        <ul>
                            @foreach($toners_bajos as $modelo)
                                <li>{{ strtoupper($modelo) }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection