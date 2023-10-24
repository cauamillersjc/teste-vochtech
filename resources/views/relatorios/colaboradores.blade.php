@extends('layout')

@section('content')
    <h1 class="text-center">Relatório de Colaboradores</h1>
    <table class="table table-bordered text-center table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Unidade</th>
                <th>Cargo</th>
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
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
