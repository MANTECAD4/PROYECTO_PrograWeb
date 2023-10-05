<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('producto/indexproducto', compact('productos'))->with('css', asset('/css/EmpleadoEstilos/style.css'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto/createProducto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric|min:1',
            'descripcion' => 'max:164',
            'unidades' => 'required|integer|min:1',
            'marca' => 'required',
            'categoria' => 'required',
        ]);
    
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->unidades = $request->unidades;
        $producto->marca = $request->marca;
        $producto->categoria = $request->categoria;
    
        $insercionExitosa =$producto->save();
        
        if ($insercionExitosa) {
            // La inserción fue exitosa, puedes definir la sesión flash aquí
            Session::flash('success', 'El registro se ha creado exitosamente en la base de datos.');
        } else {
            // La inserción falló, puedes manejar el error de otra manera
            Session::flash('error', 'Hubo un problema al crear el registro en la base de datos.');
        }


        return redirect('/producto');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
        return view('producto/showProducto', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
        return view('producto/editProducto', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'max:164',
            'precio' => 'required|numeric|min:1',
            'unidades' => 'required|integer|min:1',
            'marca' => 'required',
            'categoria' => 'required',
        ]);
    
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->unidades = $request->unidades;
        $producto->marca = $request->marca;
        $producto->categoria = $request->categoria;
    
        $producto->save();
        

        return redirect()->route('producto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
