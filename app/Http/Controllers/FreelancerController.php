<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Freelancer as Freelancer;

class FreelancerController extends Controller
{
    public function index()
    {
        $freelancers = Freelancer::all();
        return view('freelancers.index', compact('freelancers'));
    }

    public function create()
    {
        return view('freelancers.create');
    }

    public function store(Request $request)
    {
        $freelancer = new Freelancer();
        $freelancer->resumo_profissional = $request->input('resumo_profissional');
        $freelancer->habilidades = $request->input('habilidades');
        $freelancer->especialidade = $request->input('especialidade');
        // Adicione outros campos específicos de Freelancer
        $freelancer->save();

        return redirect()->route('freelancers.index');
    }

    public function show(Freelancer $freelancer)
    {
        return view('freelancers.show', compact('freelancer'));
    }

    public function edit(Freelancer $freelancer)
    {
        return view('freelancers.edit', compact('freelancer'));
    }

    public function update(Request $request, Freelancer $freelancer)
    {
        $freelancer->resumo_profissional = $request->input('resumo_profissional');
        $freelancer->habilidades = $request->input('habilidades');
        $freelancer->especialidade = $request->input('especialidade');
        // Atualize outros campos específicos de Freelancer
        $freelancer->save();

        return redirect()->route('freelancers.index');
    }

    public function destroy(Freelancer $freelancer)
    {
        $freelancer->delete();

        return redirect()->route('freelancers.index');
    }
}
