@extends('layout')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="text-center">
            <h1>Relatórios</h1>
           <div>
             <div class="mb-1">
                 <a href="{{ route('relatorio.colaboradores') }}" class="btn btn-primary w-100">Relatório de Colaboradores</a>
             </div>
            
             <div class="mb-1">
                 <a href="{{ route('relatorio.total_colaboradores_por_unidade') }}" class="btn btn-primary w-100">Total de
                     Colaboradores por Unidade</a>
             </div>
            
             <div>
                 <a href="{{ route('relatorio.ranking_melhores_avaliados') }}" class="btn btn-primary w-100">Ranking de Melhores
                     Avaliados</a>
             </div>
           </div>
        </div>
    </div>
@endsection
