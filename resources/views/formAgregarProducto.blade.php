@extends('layout.plantilla')

@section('title', 'Alta de Producto')

@section('h1', 'Alta de un nuevo Producto')

@section('main')

    <div class="alert bg-light p-3">
        <form action="/agregarProducto" method="post" enctype="multipart/form-data">
            Nombre: <br>
            <input type="text" name="prdNombre" class="form-control">
            <br>
            Precio: <br>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">AR$</div>
                </div>
                <input type="text" name="prdPrecio" class="form-control">
            </div>
            <br>
            Marca: <br>
            <select name="idMarca" class="form-control" required>
                <option value="">Seleccione una marca</option>
                @foreach( $marcas as $marca )
                    <option value="{{ $marca->idMarca }}">{{ $marca->mkNombre }}</option>
                @endforeach
            </select>
            <br>
            Categoría: <br>
            <select name="idCategoria" class="form-control" required>
                <option value="">Seleccione una Categoría</option>
                @foreach( $categorias as $categoria )
                    <option value="{{ $categoria->idCategoria }}">{{ $categoria->catNombre }}</option>
                @endforeach
            </select>
            <br>
            Presentacion: <br>
            <textarea name="prdPresentacion" class="form-control"></textarea>
            <br>
            Stock: <br>
            <input type="number" name="prdStock" class="form-control">
            <br>
            Imagen: <br>
            <input type="file" name="prdImagen" class="form-control">
            <br>
            <input type="submit" value="Agregar Producto" class="btn btn-secondary mb-3">
            <a href="/adminProductos" class="btn btn-outline-secondary mb-3">Volver al panel de Productos</a>
        </form>
    </div>

@endsection
