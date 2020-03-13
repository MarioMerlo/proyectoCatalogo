@extends('layout.plantilla')

@section('title', 'Administración de Usuarios')

@section('h1', 'Panel de administración de Usuarios')

@section('main')

    @if (session('mensaje'))
        <div id="successMessage" class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
        <tr class="text-center">
            <th>ID</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>EMAIL</th>
            <th>ESTADO</th>
            <th colspan="2" class="text-right">
                <a href="/agregarUsuario" class="btn btn-secondary"><i class="fas fa-plus-square"></i> agregar</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->idUsuario }}</td>
            <td>{{ $usuario->usuNombre }}</td>
            <td>{{ $usuario->usuApellido }}</td>
            <td>{{ $usuario->usuEmail }}</td>
            <td>{{ $usuario->usuEstado }}</td>
            <td class="text-center">
                <a href="/modificarUsuario/{{ $usuario->idUsuario }}" class="btn btn-dark"><i class="fas fa-edit"></i> modificar</a>
            </td>
            <td class="text-center">
                <a href="/eliminarUsuario/{{ $usuario->idUsuario }}" class="btn btn-danger eliminar"><i class="fas fa-trash-alt"></i> eliminar</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
