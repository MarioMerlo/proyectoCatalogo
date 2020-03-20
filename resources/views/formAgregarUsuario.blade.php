@extends('layout.plantilla')

@section('title', 'Alta de usuario')

@section('h1', 'Alta de una nuevo usuario')

@section('main')


    <!-- Esto captura los errores de la validacion de Laravel -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="alert bg-light p-3">
        <form action="/agregarUsuario" method="post">
            @csrf
            Nombre:<br>
            <input type="text" name="usuNombre" class="form-control" required><br>

            Apellido:<br>
            <input type="text" name="usuApellido" class="form-control" required><br>

            Email:<br>
            <input type="text" name="usuEmail" class="form-control" required><br>

            Password:<br>
            <input type="text" name="usuPass" class="form-control" required><br>

            Estado:<br>
            <select name="usuEstado" id="" class="form-control mb-3">
                <option value="">Seleccionar...</option>
                <option value="0">Inactivo</option>
                <option value="1">Activo</option>
            </select>

            <button class="btn btn-dark">Agregar usuario</button>
            <a href="/adminUsuarios" class="btn btn-secondary">Volver a Panel de usuarios</a>
        </form>
    </div>


@endsection
