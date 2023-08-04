<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Productos;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->id_categoria != 'todos') {
            $productos = Productos::where('categoria_id', $request->id_categoria)->get();
        } else {
            $productos = Productos::all();
        }
        $categorias = Categorias::all();
        return view('productos.index', compact('productos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categorias::all();
        return view('productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $producto = new Productos();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->categoria_id = $request->categoria_id;
        
        $imagePath = $request->file('imagen')->store('products', 'public');
        $producto->imagen = $imagePath;

        $producto->save();

        return redirect()->route('productos.index')
            ->with('message', 'Producto creado correctamente.');

    }

    /**
     * Display the specified resource.
     */
   

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Productos::find($id);
        $categorias = Categorias::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $producto = Productos::find($id);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->categoria_id = $request->categoria_id;
        
        $imagePath = $request->file('imagen')->store('products', 'public');
        $producto->imagen = $imagePath;

        $producto->save();

        return redirect()->route('productos.index')
            ->with('message', 'Producto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Productos::find($id);
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('message', 'Producto eliminado correctamente.');
    }
}
