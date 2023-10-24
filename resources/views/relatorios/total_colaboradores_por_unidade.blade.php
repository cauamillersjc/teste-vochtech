@extends('layout')

@section('content')
    <h1 class="text-center">Total de Colaboradores por Unidade</h1>
    <table class="table table-bordered text-center table-striped">
        <thead>
            <tr>
                <th>Nome Fantasia</th>
                <th>Razão Social</th>
                <th>CNPJ</th>
                <th>Total de Colaboradores</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unidades as $unidade)
                <tr>
                    <td>{{ $unidade->nome_fantasia }}</td>
                    <td>{{ $unidade->razao_social }}</td>
                    <td>{{ $unidade->cnpj }}</td>
                    <td>{{ $unidade->colaboradores->count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
