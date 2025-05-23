@extends('layout.plantilla')

@section('content')
<div class="container mt-5">
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="username">Usuario</label>
                <input id="usuario" class="block mt-1 w-full" type="text" name="username" required autofocus />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        @error('login')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>
@endsection
