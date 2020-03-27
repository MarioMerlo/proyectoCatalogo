@extends('layout.plantilla')

@section('title', 'Modificación de Producto')

@section('h1', 'Modificación de un Producto')

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
        <form action="/modificarProducto" method="post" enctype="multipart/form-data">
            @csrf
            Nombre: <br>
            <input type="text" name="prdNombre" class="form-control" value="{{  old('prdNombre', $producto['prdNombre']) }}">
            <br>
            Precio: <br>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">AR$</div>
                </div>
                <input type="text" name="prdPrecio" class="form-control" value="{{  old('prdPrecio', $producto['prdPrecio']) }}">
            </div>
            <br>
            Marca: <br>
            <select name="idMarca" class="form-control" required>
                <option value="">Seleccione una marca</option>
                    <option value="{{ $producto->idMarca }}" selected>{{ $producto->getMarca->mkNombre }}</option>
                @foreach( $marcas as $marca )
                    <option value="{{ $marca->idMarca }}">{{ $marca->mkNombre }}</option>
                @endforeach
            </select>
            <br>
            Categoría: <br>
            <select name="idCategoria" class="form-control" required>
                <option value="">Seleccione una Categoría</option>
                    <option value="{{ $producto->idCategoria }}" selected>{{ $producto->getCategoria->catNombre }}</option>
                @foreach( $categorias as $categoria )
                    <option value="{{ $categoria->idCategoria }}">{{ $categoria->catNombre }}</option>
                @endforeach
            </select>
            <br>
            Presentacion: <br>
            <textarea name="prdPresentacion" class="form-control">{{ old('prdPresentacion', $producto['prdPresentacion']) }}</textarea>
            <br>
            Stock: <br>
            <input type="number" name="prdStock" class="form-control" min="0" value="{{ old('prdStock', $producto['prdStock']) }}">
            <br>
            Imagen: <br>
            <img src="/img/productos/{{$producto->prdImagen}}" alt="" class="img-thumbnail">
            <input type="file" name="prdImagen" class="form-control">
            <br>
            <input type="submit" value="Modificar Producto" class="btn btn-secondary mb-3">
            <a href="/adminProductos" class="btn btn-outline-secondary mb-3">Volver al panel de Productos</a>
        </form>
    </div>

@endsection
