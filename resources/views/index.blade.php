@extends('layout.plantilla')

@section('title', 'Catálogo de productos')

@section('h1', 'Catálogo de productos')

@section('main')

    <div class="list-group">
        <a href="/adminMarcas" class="list-group-item list-group-item-action">
            Panel de administración de Marcas
        </a>
        <a href="/adminCategorias" class="list-group-item list-group-item-action">
            Panel de administración de Categorías
        </a>
        <a href="/adminProductos" class="list-group-item list-group-item-action">
            Panel de administración de Productos
        </a>
        <a href="/adminUsuarios" class="list-group-item list-group-item-action">
            Panel de administración de Usuarios
        </a>
    </div>

@endsection
