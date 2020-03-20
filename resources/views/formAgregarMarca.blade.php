@extends('layout.plantilla')

@section('title', 'Alta de marca')

@section('h1', 'Alta de una nueva marca')

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
        <form action="/agregarMarca" method="post">
            @csrf
            <input type="text" name="mkNombre" class="form-control" required><br>
            <button class="btn btn-dark">Agregar marca</button>
            <a href="/adminMarcas" class="btn btn-secondary">Volver a Panel de marcas</a>
        </form>
    </div>


@endsection
