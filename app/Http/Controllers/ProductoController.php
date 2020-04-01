<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Marca;
use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$productos = Producto::with('getMarca', 'getCategoria')->get(); // aca llame al metodo del model donde hace la relacion de tablas
        $productos = Producto::with('getMarca', 'getCategoria')->paginate(5);
        return view('adminProductos', ['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // Paso la vista, y le envio el listado de marcas y de categorias para llenar los select del form
        $marcas = Marca::all(); // chequear que arriba agrego el llamado a MArca
        $categorias = Categoria::all();
        return view('formAgregarProducto',
                            [
                                'marcas'=>$marcas,
                                'categorias'=>$categorias
                            ]);
    }

    ## Metodo para subir la imagen
    private function subirImagen(Request $request) {
        ##upload imagen
        $prdImagen = 'noDisponible.jpg'; // Valor predeterminado si no envio image EN alta

        if( $request->imagenOriginal ) { ## Si no se envia imagen en MODIFICACION
            $prdImagen = $request->imagenOriginal;
        }

        if( $request->file('prdImagen') ){ ## Si se envia una imagen
            // Nombre original de la imagen
            // $prdImagen= $request->prdImagen->getClientOriginalName();

            // Nombre concatenado con la fecha
            $prdImagen = time().'.'.$request->file('prdImagen')->getClientOriginalExtension();

            // Subir imagen
            $request->prdImagen->move(public_path('img/productos/'), $prdImagen); // indico donde va la imagen y con que nombre debe ir
        }
        return $prdImagen;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validacion
        $validacion = $request->validate(
            [
                'prdNombre'=>'required|min:3|max:50',
                'prdPrecio'=>'required|numeric|min:0',
                'prdPresentacion'=>'required|min:3|max:150',
                'prdStock'=>'required|integer|min:0',
                'prdImagen'=>'image|mimes:jpg,jpeg,png,gif,svg|max:2048'
            ]
        );
        $prdImagen = $this->subirImagen($request);

        $Producto = new Producto(); ## ESto es para instanciar un objeto nuevo
        $Producto->prdNombre        = $request->input('prdNombre');
        $Producto->prdPrecio        = $request->input('prdPrecio');
        $Producto->idMarca          = $request->input('idMarca');
        $Producto->idCategoria      = $request->input('idCategoria');
        $Producto->prdPresentacion  = $request->input('prdPresentacion');
        $Producto->prdStock         = $request->input('prdStock');
        $Producto->prdImagen        = $prdImagen; #ESto lo estoy tomando del upload

        $Producto->save();
        return redirect('/adminProductos')
            ->with('mensaje','Producto: '.$Producto->prdNombre .' agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idProducto)
    {
        //
        $Producto = Producto::with('getMarca', 'getCategoria')->find($idProducto);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('formModificarProducto', [
            'producto'=>$Producto,
            'marcas'=>$marcas,
            'categorias'=>$categorias
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        // validacion
        $validacion = $request->validate(
            [
                'prdNombre'=>'required|min:3|max:50',
                'prdPrecio'=>'required|numeric|min:0',
                'prdPresentacion'=>'required|min:3|max:150',
                'prdStock'=>'required|integer|min:0',
                'prdImagen'=>'image|mimes:jpg,jpeg,png,gif,svg|max:2048'
            ]
        );
        ## upload de imagen
        $prdImagen = $this->subirImagen($request);


        $Producto = Producto::find( $request->input('idProducto') ); ## Esto es para encontrar el poducto a cambiar

        $Producto->prdNombre        = $request->input('prdNombre');
        $Producto->prdPrecio        = $request->input('prdPrecio');
        $Producto->idMarca          = $request->input('idMarca');
        $Producto->idCategoria      = $request->input('idCategoria');
        $Producto->prdPresentacion  = $request->input('prdPresentacion');
        $Producto->prdStock         = $request->input('prdStock');
        $Producto->prdImagen        = $prdImagen; #ESto lo estoy tomando del upload

        $Producto->save();

        return redirect('/adminProductos')
            ->with('mensaje','Producto: '.$Producto->prdNombre .' modificado correctamente');


    }

    // Generamos el formulario con la confirmacion de baja
    public function eliminar($idProducto)
    {
        $Producto = Producto::with('getMarca', 'getCategoria')->find($idProducto);
        return view('formEliminarProducto', [ 'producto' => $Producto ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $Producto = Producto::find( $request->input('idProducto') ); ## Esto es para encontrar el poducto a eliminar
        $Producto->delete();

        return redirect('/adminProductos')
            ->with('mensaje','Producto: '.$Producto->prdNombre .' eliminado correctamente');


    }
}
