<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categorias::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categoria = new Categorias();
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('categorias.index')
            ->with('message', 'Categoria creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoria = Categorias::find($id);
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categoria = Categorias::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('categorias.index')
            ->with('message', 'Categoria actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categorias::find($id);
        $categoria->delete();

        return redirect()->route('categorias.index')
            ->with('message', 'Categoria eliminada correctamente.');
    }
}
