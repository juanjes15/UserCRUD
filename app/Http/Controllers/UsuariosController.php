<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['usuarios'] = usuario::orderBy('id', 'desc')->paginate(5);
        return view('usuarios.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'documento' => 'required',
            'nombres' => 'required',
        ]);
        $usuarios = new usuario;
        $usuarios->documento = $request->documento;
        $usuarios->nombres = $request->nombres;
        $usuarios->correo = $request->correo;
        $usuarios->telefono = $request->telefono;
        $usuarios->direccion = $request->direccion;
        $usuarios->save();
        return redirect()->route('usuarios.index')
            ->with('success', 'User has been created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(usuario $usuarios)
    {
        return view('usuarios.show', compact('usuario'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'documento' => 'required',
            'nombres' => 'required',
        ]);
        $usuarios = usuario::find($id);
        $usuarios->documento = $request->documento;
        $usuarios->nombres = $request->nombres;
        $usuarios->correo = $request->correo;
        $usuarios->telefono = $request->telefono;
        $usuarios->direccion = $request->direccion;
        $usuarios->save();
        return redirect()->route('usuarios.index')
            ->with('success', 'User Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')
            ->with('success', 'User has been deleted successfully');
    }
}
