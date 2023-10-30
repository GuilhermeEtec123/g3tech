<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente as Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }
    

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->endereco = $request->input('endereco');
        // Adicione outros campos específicos de Cliente
        $cliente->save();

        return redirect()->route('clientes.index');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->endereco = $request->input('endereco');
        // Atualize outros campos específicos de Cliente
        $cliente->save();

        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index');
    }
}
