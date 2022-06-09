<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

@extends('layouts.tabelacandidatos')

@section('conteudo')
<div class="float-end mb-3">
    <a href="candidatos/create" class="btn btn-outline-success">Cadastrar Candidato</a>
</div>

<table class="table table-dark table-striped mt-4">
    <thead>
        <tr>
            <td scope="col">Nome</td>
            <td scope="col">Email</td>
            <td scope="col">Telefone</td>
            <td scope="col">Usuário</td>
            <td scope="col">Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($candidatos as $candidato)
        <tr>
            <td>{{ $candidato->nome }}</td>
            <td>{{ $candidato->email }}</td>
            <td>{{ $candidato->telefone }}</td>
            <td>{{ $candidato->usuario }}</td>
            <td>
                <form action="{{route('candidatos.destroy', $candidato->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="candidatos/{{ $candidato->id }}/edit" class="btn btn-outline-info">Editar</a>
                    <button type="submit" class="btn btn-outline-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection