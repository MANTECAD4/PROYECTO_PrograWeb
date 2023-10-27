<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria/indexcategoria', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria/createCategoria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->merge(['user_id' => Auth::id()]);
        Categoria::create($request->all());

        //$categoria = new Categoria();
        //$categoria->nombre = $request->nombre;
        //$categoria->descripcion = $request->descripcion;
        //$categoria->user_id = Auth::id();
        //$categoria->save();
        //$user = Auth::user();
        //$user->categorias()->save($categoria);

        return redirect('categoria');
    }
    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return view('categoria/showCategoria', compact('categoria'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
        Categoria::where('id',$categoria->id)->update($request->except('_token','_method'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
        $categoria->delete();
        return redirect()->route('categoria.index');
    }
}
