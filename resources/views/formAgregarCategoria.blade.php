@extends('layout.plantilla')

@section('title', 'Alta de categoría')

@section('h1', 'Alta de una nueva categoría')

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
        <form action="/agregarCategoria" method="post">
            @csrf
            <input type="text" name="catNombre" class="form-control" required><br>
            <button class="btn btn-dark">Agregar categoría</button>
            <a href="/adminCategorias" class="btn btn-secondary">Volver a Panel de marcas</a>
        </form>
    </div>


@endsection
