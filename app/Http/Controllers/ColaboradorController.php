<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Colaborador;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    public function list()
    {
        $colaboradores = Colaborador::with(['unidade', 'cargoColaborador'])->get();

        return view('colaboradores.dashboard', ['colaboradores' => $colaboradores])->with('success', session('success'));
    }

    public function create()
    {
        $unidades = Unidade::all();
        $cargos = Cargo::all();

        return view('colaboradores.create', ['unidades' => $unidades, 'cargos' => $cargos]);
    }

    public function store(Request $request)
    {
        $colaborador = new Colaborador;
        $colaborador->nome = $request->input('nome');
        $colaborador->cpf = $request->input('cpf');
        $colaborador->email = $request->input('email');
        $colaborador->unidade_id = $request->input('unidade');
        $colaborador->save();

        $colaborador->cargos()->attach($request->input('cargo'), ['nota_desempenho' => 0]);

        return redirect('/colaboradores')->with('success', 'Colaborador cadastrado com sucesso.');
    }

    public function atualizarNota(Request $request, Colaborador $colaborador)
    {
        $request->validate([
            'nota_desempenho' => 'required|integer|min:0|max:10',
        ]);

        $colaborador->cargos->first()->pivot->update([
            'nota_desempenho' => $request->nota_desempenho,
        ]);

        return redirect('/colaboradores')->with('success', 'Nota de desempenho de ' . $colaborador->nome . ' atualizada com sucesso.');
    }

    public function relatorioColaboradores()
    {
        $colaboradores = Colaborador::with(['unidade', 'cargos'])->get();
        return view('relatorios.colaboradores', compact('colaboradores'));
    }


    public function relatorioRankingMelhoresAvaliados()
    {
        $colaboradores = Colaborador::with(['unidade', 'cargoColaborador'])->get();

        $colaboradores = $colaboradores->sortByDesc(function ($colaborador) {
            return $colaborador->cargos->first()->pivot->nota_desempenho;
        });

        return view('relatorios.ranking_melhores_avaliados', compact('colaboradores'));
    }
}
