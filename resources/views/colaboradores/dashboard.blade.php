@extends('layout')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Lista de Colaboradores</h1>

    <div class="float-right mb-3">
        <button class="btn btn-primary" onclick="window.location.href='{{ route('colaboradores.create') }}'">Cadastrar
            Colaborador</button>
    </div>

    <table class="table table-bordered text-center table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Unidade</th>
                <th>Cargo</th>
                <th>Nota</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colaboradores as $colaborador)
                <tr>
                    <td>{{ $colaborador->id }}</td>
                    <td>{{ $colaborador->nome }}</td>
                    <td>{{ $colaborador->cpf }}</td>
                    <td>{{ $colaborador->email }}</td>
                    <td>{{ $colaborador->unidade->nome_fantasia }}</td>
                    <td>{{ $colaborador->cargos->first()->cargo }}</td>
                    <td>{{ $colaborador->cargos->first()->pivot->nota_desempenho }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editNotaModal"
                            onclick="openModal({{ $colaborador->id }}, {{ $colaborador->cargos->first()->pivot->nota_desempenho }});">
                            Atualizar Nota
                        </button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="editNotaModal" tabindex="-1" role="dialog" aria-labelledby="editNotaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editNotaModalLabel">Editar Nota do Colaborador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('atualizarNota', 0) }}" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nota_desempenho">Nova Nota de Desempenho</label>
                            <input type="number" class="form-control" id="nota_desempenho" name="nota_desempenho" min="0" max="10">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        openModal = (id, nota) => {
            const modal = document.getElementById('editNotaModal');
            const form = modal.querySelector('form');
            form.action = `{{ route('atualizarNota', '') }}/${id}`;

            const notaDesempenhoInput = modal.querySelector('#nota_desempenho');
            notaDesempenhoInput.value = nota;
        }
    </script>
@endsection
