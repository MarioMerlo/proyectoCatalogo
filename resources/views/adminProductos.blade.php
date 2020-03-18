@extends('layout.plantilla')

@section('title', 'Administración de Productos')

@section('h1', 'Panel de administración de Productos')

@section('main')

    @if (session('mensaje'))
        <div id="successMessage" class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
        <tr class="text-center">
            <th>PRODUCTO</th>
            <th>MARCA</th>
            <th>CATEGORIA</th>
            <th>PRECIO</th>
            <th>PRESENTACION</th>
            <th>STOCK</th>
            <th>IMAGEN</th>
            <th colspan="2" class="text-right">
                <a href="/agregarProducto" class="btn btn-secondary"><i class="fas fa-plus-square"></i> agregar</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->prdNombre }}</td>
            <td>{{ $producto->getMarca->mkNombre }}</td>
            <td>{{ $producto->getCategoria->catNombre }}</td>
            <td>{{ $producto->prdPrecio }}</td>
            <td>{{ $producto->prdPresentacion }}</td>
            <td>{{ $producto->prdStock }}</td>
            <td><img src="/img/productos/{{ $producto->prdImagen }}" class="img-thumbnail" alt=""></td>
            <td class="text-center">
                <a href="/modificarProducto/{{ $producto->idProducto }}" class="btn btn-dark"><i class="fas fa-edit"></i> modificar</a>
            </td>
            <td class="text-center">
                <a href="/eliminarProducto/{{ $producto->idProducto }}" class="btn btn-danger eliminar"><i class="fas fa-trash-alt"></i> eliminar</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
