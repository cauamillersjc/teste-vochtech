@extends('layout')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Lista de Unidades</h1>

    <div class="float-right mb-3">
        <button class="btn btn-primary" onclick="window.location.href='{{ route('unidades.create') }}'">Cadastrar Unidade</button>
    </div>

    <table class="table table-bordered text-center table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Fantasia</th>
                <th>Razão Social</th>
                <th>CNPJ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unidades as $unidade)
                <tr>
                    <td>{{ $unidade->id }}</td>
                    <td>{{ $unidade->nome_fantasia }}</td>
                    <td>{{ $unidade->razao_social }}</td>
                    <td>{{ $unidade->cnpj }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
