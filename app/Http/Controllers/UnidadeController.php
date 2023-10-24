<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function list()
    {
        $unidades = Unidade::all();

        return view('unidades.dashboard', ['unidades' => $unidades])->with('success', session('success'));
    }

    public function create()
    {
        return view('unidades.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome_fantasia' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string|max:255',
        ]);

        Unidade::create($data);

        return redirect('/unidades')->with('success', 'Unidade cadastrada com sucesso.');
    }

    public function relatorioTotalColaboradoresPorUnidade()
    {
        $unidades = Unidade::withCount('colaboradores')->get();
        return view('relatorios.total_colaboradores_por_unidade', compact('unidades'));
    }

}
