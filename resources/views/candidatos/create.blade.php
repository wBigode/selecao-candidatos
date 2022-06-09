{{ HTML::style('css/app.css') }}
{{ HTML::script('js/app.js') }}

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>

@extends('layouts.tabelacandidatos')

@section('conteudo')

@if ($errors->any())
<div class="alert alert-danger d-flex row row-cols-1" role="alert">
    <div class="d-inline col">
        <div class="row row-cols-2">
            <div class="col col-md-1">
                <svg class="bi flex-shrink-0" width="20" height="20" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
            </div>
            <div class="col col-md-11">
                <h5><b>Atenção!</b></h5>
            </div>
        </div>
    </div>
    <div class="align-items-center d-inline col">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<form action="{{route('candidatos.store')}}" method="POST">
    @csrf
    <div class="d-grid pt-4 gap-4">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="progresses">
                <div class="steps">
                    <span class="font-weight-bold span1">
                        <i class="fa fa-check icon1" hidden></i>
                        <b class="b1">1</b>
                    </span>
                </div>
                <span class="line"></span>
                <div class="steps">
                    <span class="font-weight-bold">
                        <i class="fa fa-check icon2" hidden></i>
                        <b class="b2">2</b>
                    </span>
                </div>
                <span class="line"></span>
                <div class="steps">
                    <span class="font-weight-bold">
                        <b>3</b>
                    </span>
                </div>
            </div>
        </div>
        <div class="pt-4 col-md-8 container justify-content-center align-items-center form_1">
            <h3>Dados Pessoais</h3>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input id="nome" name="nome" type="text" class="form-control" tabindex="1">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="email" class="form-control" tabindex="1">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input id="telefone" name="telefone" type="text" class="form-control" tabindex="1">
            </div>
        </div>
        <div class="pt-4 col-md-8 container justify-content-center align-items-center form_2" style="display: none;">
            <h3>Experiências</h3>
            <div class="mb-3">
                <label for="experiencias" class="form-label">Experiências Profissionais</label>
                <input id="experiencias" name="experiencias" type="text" class="form-control" tabindex="1">
            </div>
            <div class="mb-3">
                <label for="formacoes" class="form-label">Formações Acadêmicas</label>
                <input id="formacoes" name="formacoes" type="text" class="form-control" tabindex="1">
            </div>
            <small>Pressione <span class="fa fa-plus gs"></span> para adicionar uma nova experiência.</small>
        </div>
        <div class="pt-4 col-md-8 container justify-content-center align-items-center form_3" style="display: none;">
            <h3>Dados de acesso</h3>
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuário</label>
                <input id="usuario" name="usuario" type="text" class="form-control" tabindex="1">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input id="password" name="password" type="password" class="form-control" tabindex="1">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirme sua senha</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" tabindex="1">
            </div>
        </div>
        <div class="col-md-8 container justify-content-center align-items-center">
            <div class="form_1_btns">
                <div class="row justify-content-evenly">
                    <div class="col-4">
                        <button type="button" class="btn_next btn btn-outline-primary">Próximo</button>
                    </div>
                </div>
            </div>
            <div class="form_2_btns" style="display: none;">
                <div class="row justify-content-evenly">
                    <div class="col-4">
                        <button type="button" class="btn_back btn btn-outline-warning">Voltar</button>
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn_next btn btn-outline-primary">Próximo</button>
                    </div>
                </div>
            </div>
            <div class="form_3_btns" style="display: none;">
                <div class="row justify-content-evenly">
                    <div class="col-4">
                        <button type="button" class="btn_back btn btn-outline-warning">Voltar</button>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn_next btn_done btn btn-outline-primary">Finalizar</button>
                    </div>
                </div>
            </div>
        </div>
</form>
@endsection