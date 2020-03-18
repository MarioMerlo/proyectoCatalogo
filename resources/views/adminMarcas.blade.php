@extends('layout.plantilla')

@section('title', 'Administración de Marcas')

@section('h1', 'Panel de administración de Marcas')

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
            <th>MARCA</th>
            <th colspan="2" class="text-right">
                <a href="/agregarMarca" class="btn btn-secondary"><i class="fas fa-plus-square"></i> agregar</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($marcas as $marca)
        <tr>
            <td>{{ $marca->idMarca }}</td>
            <td class="w-50">{{ $marca->mkNombre }}</td>
            <td class="text-center">
                <a href="/modificarMarca/{{ $marca->idMarca }}" class="btn btn-dark"><i class="fas fa-edit"></i> modificar</a>
            </td>
            <td class="text-center">
                <a href="/eliminarMarca/{{ $marca->idMarca }}" class="btn btn-danger eliminar"><i class="fas fa-trash-alt"></i> eliminar</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Esto crea el paginador, pero debo haber usado el metodo paginate -->
    {{$marcas->links()}}

@endsection
