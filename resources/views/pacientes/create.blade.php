@extends('layouts.app')

@section('title', 'Pacientes - TeleCare')

@push('styles')
    @vite(['resources/css/paciente/create.css'])
@endpush

@section('content')


    <!-- Header da Página -->
    <header class="page-header">
        <div class="header-icon-box">
            <a href="{{ route('pacientes.index') }}" class="arrow-back">
                <img src="{{ asset('images/paciente/Arrow 1.svg') }}" alt="Voltar">
            </a>

        </div>
        <div class="header-titles">

            <h1 class="page-title">Editar Paciente</h1>
            <p class="page-subtitle">Preencha os campos</p>
        </div>
    </header>

    <!-- Seção: Dados do Paciente -->
    <section class="card card-dados-paciente">
        <h2 class="card-title title-dados-paciente">Dados do Paciente</h2>

        <!-- Foto do Paciente -->
        <div class="photo-upload-container">
            <img class="photo-preview" src="{{ asset('images/paciente/acount.png') }}" alt="Foto do Paciente" />
            <div class="btn-take-photo">
                <div class="btn-take-photo-border"></div>
                <div class="btn-take-photo-icon"></div>
                <span class="btn-take-photo-text">TIRAR FOTO</span>
            </div>
        </div>

        <!-- Campos: Nome, Nascimento, Sexo -->
        <div class="field-label label-nome">Nome</div>
        <div class="input-box input-nome">
            <div class="input-text">Paciente Teste</div>
        </div>

        <div class="field-label label-nascimento">Data de Nascimento</div>
        <div class="input-box input-nascimento">
            <div class="input-text">15/04/1990</div>
        </div>

        <div class="field-label label-sexo">Sexo</div>
        <div class="input-box input-sexo">
            <div class="input-text">Masculino</div>
        </div>

        <!-- Campos: RG, CPF -->
        <div class="field-label label-rg">RG</div>
        <div class="input-box input-rg">
            <div class="input-text">12.345.678-9 / SP</div>
        </div>

        <div class="field-label label-cpf">CPF</div>
        <div class="input-box input-cpf">
            <div class="input-text">999.999.999-99</div>
        </div>

        <!-- Campos: Telefone, Email -->
        <div class="field-label label-telefone">Telefone</div>
        <div class="input-box input-ddd">
            <div class="input-text text-center">(11)</div>
        </div>
        <div class="input-box input-telefone">
            <div class="input-text">99770-7070</div>
        </div>

        <div class="field-label label-email">Email</div>
        <div class="input-box input-email">
            <div class="input-text">carlin.noisehnois@gmail.com</div>
        </div>

        <!-- Campos: Profissão, Cartão SUS -->
        <div class="field-label label-profissao">Profissão</div>
        <div class="input-box input-profissao">
            <div class="input-text">Professor</div>
        </div>

        <div class="field-label label-sus">Cartão SUS</div>
        <div class="input-box input-sus">
            <div class="input-text placeholder-text">Digite o Cartão SUS do paciente</div>
        </div>
    </section>

    <!-- Seção: Endereço do Paciente -->
    <section class="card card-endereco-paciente">
        <h2 class="card-title title-endereco">Endereço do Paciente</h2>

        <!-- CEP, Cidade, Estado -->
        <div class="field-label label-cep">CEP</div>
        <div class="input-box input-cep">
            <div class="input-text">19000-999</div>
        </div>

        <div class="field-label label-cidade">Cidade</div>
        <div class="input-box input-cidade">
            <div class="input-text">Pres. Prudente</div>
        </div>

        <div class="field-label label-estado">Estado</div>
        <div class="input-box input-estado">
            <div class="input-text">SP</div>
        </div>

        <!-- Logradouro -->
        <div class="field-label label-logradouro">Logradouro</div>
        <div class="input-box input-logradouro">
            <div class="input-text">Rua dos Alfeneiros</div>
        </div>

        <!-- Bairro, Número, Complemento -->
        <div class="field-label label-bairro">Bairro</div>
        <div class="input-box input-bairro">
            <div class="input-text">Surrey</div>
        </div>

        <div class="field-label label-numero">Número</div>
        <div class="input-box input-numero">
            <div class="input-text">4</div>
        </div>

        <div class="field-label label-complemento">Complemento</div>
        <div class="input-box input-complemento">
            <div class="input-text placeholder-text">Ex: Casa, Apto</div>
        </div>
    </section>

    <!-- Rodapé / Ações -->
    <footer class="card card-actions">
        <button class="btn btn-voltar">
            <span class="btn-text">VOLTAR</span>
        </button>

        <button class="btn btn-rascunho">
            <span class="btn-text">SALVAR RASCUNHO</span>
        </button>

        <button class="btn btn-salvar">
            <span class="btn-text">SALVAR</span>
        </button>
    </footer>

@endsection
