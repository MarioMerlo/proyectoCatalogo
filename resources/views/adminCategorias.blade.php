@extends('layout.plantilla')

@section('title', 'Administración de Categorías')

@section('h1', 'Panel de administración de Categorías')

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
            <th>CATEGORÍA</th>
            <th colspan="2" class="text-right">
                <a href="/agregarCategoria" class="btn btn-secondary"><i class="fas fa-plus-square"></i> agregar</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td>{{ $categoria->idCategoria }}</td>
            <td class="w-50">{{ $categoria->catNombre }}</td>
            <td class="text-center">
                <a href="/modificarCategoria/{{ $categoria->idCategoria }}" class="btn btn-dark"><i class="fas fa-edit"></i> modificar</a>
            </td>
            <td class="text-center">
                <a href="/eliminarCategoria/{{ $categoria->idCategoria }}" class="btn btn-danger eliminar"><i class="fas fa-trash-alt"></i> eliminar</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{ $categorias->links() }}

@endsection
