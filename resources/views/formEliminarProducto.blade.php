@extends('layout.plantilla')

@section('title', 'Baja de producto')

@section('h1', 'Confirmación de baja de producto')

@section('main')

   <div class="card col-12 p-3 mt-3 border-danger">
       <div class="row">
           <div class="col-6">
            <img src="/img/productos/noDisponible.jpg" alt="" class="img-thumbnail">
           </div>
           <div class="card-body col-6">
               <h2 class="text-danger">{{ $producto->prdNombre }}</h2>
               <p>{{ $producto->getMarca->mkNombre }}</p>
               <p>{{ $producto->getCategoria->catNombre }}</p>
               <p>AR$ {{ $producto->prdPrecio }}</p>
               <form action="/eliminarProducto" method="post">
                   @csrf
                   <input type="hidden" name="idProducto" value="{{ $producto->idProducto }}">
                   <button class="btn btn-danger mr-2">Confirmar baja</button>
                   <a href="/adminProductos" class="btn btn-outline-secondary">Volver a panel</a>
               </form>
           </div>
       </div>
   </div>
    <script>
        Swal.fire({
        title: 'Desea eliminar el producto seleccionado?',
        text: "Era acción no se puede deshacer",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#333',
        cancelButtonText: 'No eliminar!',
        confirmButtonText: 'Sí, confirmar!'
        }).then((result) => {
        if (!result.value) {
            //redireccion a adminProductos
            window.location = ('/adminProductos')
        }
        })
    </script>

@endsection
