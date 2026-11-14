@extends('layouts.app')

@section('title', 'Nova Especialidade - TeleCare')

@push('styles')
    @vite(['resources/css/paciente/create.css'])
    <style>
        .btn-action-save {
            background-color: #8BA88E; border-color: #8BA88E; border-radius: 8px;
            font-weight: 600; transition: all 0.2s; padding: 10px 30px; color: white;
        }
        .btn-action-save:hover { background-color: #7a947d; border-color: #7a947d; color: white; }
        .btn-action-cancel {
            background-color: #f8f9fa; border: 1px solid #ddd; border-radius: 8px;
            font-weight: 500; color: #6c757d; padding: 10px 25px; transition: all 0.2s;
        }
        .btn-action-cancel:hover { background-color: #e2e6ea; color: #495057; }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <header class="page-header mb-4">
            <div class="header-title-group">
                <!-- Volta dinamicamente de onde o usuário veio -->
                <a href="{{ $redirectTo }}" class="btn-back">
                    <img src="{{ asset('images/paciente/Arrow 1.svg') }}" alt="Voltar">
                </a>
                <div>
                    <h1 class="page-title">Nova Especialidade</h1>
                    <p class="page-subtitle">Cadastre uma nova especialidade no sistema</p>
                </div>
            </div>
        </header>

        <div class="card bg-white p-4 rounded shadow-sm border-0">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action='/especialidades'>
                @csrf
                
                <!-- Input invisível que guarda a tela anterior -->
                <input type="hidden" name="redirect_to" value="{{ $redirectTo }}">

                <div class="mb-4">
                    <label for="nome" class="form-label fw-bold">Informe o nome da Especialidade</label>
                    <input type="text" id="nome" name="nome" class="form-control form-control-lg" required placeholder="Ex: Cardiologia" maxlength="255">
                </div>

                <div class="d-flex justify-content-end gap-3 pt-3 border-top">
                    <a href="{{ $redirectTo }}" class="btn btn-action-cancel shadow-sm">Cancelar</a>
                    <button type="submit" class="btn btn-action-save shadow">Salvar Especialidade</button>
                </div>
            </form>
        </div>
    </div>
@endsection