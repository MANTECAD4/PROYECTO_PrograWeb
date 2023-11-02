<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('cliente/menu_cliente', compact('productos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente/createCliente');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $errors = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'required|email|max:255|unique:users,email',
            'fecha_nac' => 'required|date',
            'direccion' => 'required|string|max:255',
            'password' => 'required|min:8',
            'password2' => 'required|same:password',
        ]);
        try
        {
            DB::beginTransaction();
            $usuario = User::create(['name' => $request->nombre,'email' => $request->correo,'password' => Hash::make($request->password),'type_user' => 'cliente']);
            $request->merge(['user_id' => $usuario->id]); 
            Cliente::create($request->except(['nombre', 'correo', 'password', 'password2','_token', '_method']));
            
            DB::commit();
            
            Auth::login($usuario);
            if (Auth::check()) {
                return redirect()->route('cliente.index'); 
            }
        } 
        catch (\Exception $e) 
        {
            DB::rollBack(); 
            return redirect()->route('cliente.create')->withErrors($errors)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
