@extends('layout')

@section('content')
    <h1 class="text-center">Ranking de Colaboradores Melhores Avaliados</h1>
    <table class="table table-bordered text-center table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Unidade</th>
                <th>Cargo</th>
                <th>Nota de Desempenho</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colaboradores as $colaborador)
                <tr>
                    <td>{{ $colaborador->nome }}</td>
                    <td>{{ $colaborador->cpf }}</td>
                    <td>{{ $colaborador->email }}</td>
                    <td>{{ $colaborador->unidade->nome_fantasia }}</td>
                    <td>{{ $colaborador->cargos->first()->cargo }}</td>
                    <td>{{ $colaborador->cargos->first()->pivot->nota_desempenho }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
