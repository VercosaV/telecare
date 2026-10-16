@extends('layouts.app')

@section('title', 'Pacientes - TeleCare')

@push('styles')
    @vite(['resources/css/paciente/index.css'])
@endpush

@section('content')
    <div class="content-wrapper">

        @if (session('mensagem'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('mensagem') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Cabeçalho da Página -->
        <header class="page-header">
            <div class="header-title-group">
                <button class="btn-back">
                    <img src="{{ asset('images/paciente/Arrow 1.svg') }}" alt="Voltar">
                </button>
                <div>
                    <h1 class="page-title">Lista de Pacientes</h1>
                    <p class="page-subtitle">Consulte seus pacientes</p>
                </div>
            </div>
            <a href="{{ route('pacientes.create') }}" class="btn-novo">
                Novo
            </a>
        </header>

        <!-- Lista de Pacientes -->
        <section class="patient-list">
            <article class="patient-card">
                <img src="{{ asset('images/paciente/acount.png') }}" alt="Foto do Paciente" class="patient-avatar">

                <div class="patient-info">
                    <h2 class="patient-name">Paciente Teste</h2>
                    <div class="patient-meta">
                        <span class="patient-cpf">CPF: 999.999.999-99</span>
                        <span class="patient-birth">Nascimento: 01/01/1990</span>
                    </div>
                </div>

                <button class="btn-options">
                    <img src="{{ asset('images/paciente/More vertical.svg') }}" alt="Opções">
                </button>
            </article>
        </section>
    </div>
@endsection