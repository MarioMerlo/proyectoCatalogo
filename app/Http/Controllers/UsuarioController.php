<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$usuarios = Usuario::all();
        $usuarios = Usuario::paginate(5);
        return view('adminUsuarios', ['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/formAgregarUsuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $usuNombre      = $request->input('usuNombre');
        $usuApellido    = $request->input('usuApellido');
        $usuEmail       = $request->input('usuEmail');
        $usuPass        = $request->input('usuPass');
        $usuEstado      = $request->input('usuEstado');

        $validacion = $request->validate(
            [
                'usuNombre'=>'required|min:3|max:50',
                'usuApellido'=>'required|min:3|max:50',
                'usuEmail'=>'required|email',
                'usuPass'=>'required|min:3|max:50',
                'usuEstado'=>'required'
            ]
        );

        $Usuario = new Usuario;
        $Usuario->usuNombre = $usuNombre;
        $Usuario->usuApellido = $usuApellido;
        $Usuario->usuEmail = $usuEmail;
        $Usuario->usuPass = $usuPass;
        $Usuario->usuEstado = $usuEstado;

        // Aca guardo el dato
        $Usuario->save();
        return redirect('/adminUsuarios')
            ->with('mensaje','Usuario: '.$usuNombre.' '.$usuApellido.' agregado correctamente');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
