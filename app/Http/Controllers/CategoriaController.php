<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Categoria::class);
        $categorias = Categoria::all();
        return view('categoria/indexcategoria', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Categoria::class);
        return view('categoria/createCategoria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->authorize('create', Categoria::class);
        $request->validate([
            'nombre' => 'required|alpha|unique:categorias,nombre',
            'descripcion' => 'nullable|max:164',
        ]);

        Categoria::create($request->all());
        Session::flash('success', 'La categoría '. $request->nombre .' ha sido registrada con éxito!');
        return redirect()->route('categoria.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        $this->authorize('view', $categoria);
        return view('categoria/showCategoria', compact('categoria'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        $this->authorize('update', $categoria);
        return view('categoria/editCategoria', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
        $this->authorize('update', $categoria);
        $request->validate([
            'nombre' => 'required|alpha|unique:categorias,nombre,'. $categoria->id . ',id',
            'descripcion' => 'nullable|max:164',
        ]);
        Categoria::where('id',$categoria->id)->update($request->except('_token','_method'));
        Session::flash('warning', 'Categoría '. $categoria->nombre .' modificada con éxito!');
        return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $this->authorize('delete', $categoria);
        $productos_dependientes = $categoria->productos;
        
        $default = Categoria::where('nombre','Varios')->get()->first();
        
        foreach ($productos_dependientes as $dependencia)
        {
            $dependencia->categoria_id = $default->id;
            $dependencia->save();
        }
        $nombre = $categoria->nombre;
        $categoria->delete();
        Session::flash('error', 'Categoría '. $nombre .' eliminada con éxito!');
        return redirect()->route('categoria.index');
    }
}
