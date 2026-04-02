<?php

namespace App\Http\Controllers;

use App\Models\Producte;
use Illuminate\Http\Request;

class ProducteController extends Controller
{
    /**
     * Mostrar listado de productos
     */
    public function index()
    {
        $productes = Producte::all();
        return view('productes.index', compact('productes'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('productes.create');
    }

    /**
     * Guardar un nuevo producto
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'descripcio' => 'required|string',
            'preu' => 'required|numeric|min:0',
            'quantitat' => 'required|integer|min:0',
        ]);

        Producte::create($request->all());

        return redirect()->route('productes.index')
            ->with('success', 'Producte creat correctament!');
    }

    /**
     * Mostrar un producto concreto
     */
    public function show($id)
    {
        $producte = Producte::findOrFail($id);
        return view('productes.show', compact('producte'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit($id)
    {
        $producte = Producte::findOrFail($id);
        return view('productes.edit', compact('producte'));
    }

    /**
     * Actualizar un producto
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'descripcio' => 'required|string',
            'preu' => 'required|numeric|min:0',
            'quantitat' => 'required|integer|min:0',
        ]);

        $producte = Producte::findOrFail($id);
        $producte->update($request->all());

        return redirect()->route('productes.index')
            ->with('success', 'Producte actualitzat correctament!');
    }

    /**
     * Eliminar un producto
     */
    public function destroy($id)
    {
        $producte = Producte::findOrFail($id);
        $producte->delete();

        return redirect()->route('productes.index')
            ->with('success', 'Producte eliminat correctament!');
    }
}
