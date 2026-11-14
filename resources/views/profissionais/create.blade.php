@extends('layouts.app')

@section('title', 'Novo Profissional - TeleCare')

@push('styles')
    @vite(['resources/css/paciente/create.css'])
    <style>
        .type-selector {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .type-btn {
            flex: 1;
            padding: 12px;
            text-align: center;
            border: 2px solid #E2E8F0;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            color: #64748B;
            transition: all 0.2s;
            background: #F8FAFC;
        }

        .type-selector input[type="radio"] {
            display: none;
        }

        .type-selector input[type="radio"]:checked+.type-btn {
            border-color: #8BA88E;
            background-color: #eef4ef;
            color: #4a634d;
        }

        /* Espaçamento elegante entre o Select e o Botão + Nova */
        .custom-input-group {
            display: flex;
            align-items: stretch;
            width: 100%;
            gap: 15px;
        }

        .custom-input-group select {
            flex-grow: 1;
            border-radius: 8px !important;
        }

        .custom-input-group .btn-nova {
            border-radius: 8px !important;
            background-color: #8BA88E;
            border-color: #8BA88E;
            color: white;
            font-weight: 600;
            display: flex;
            align-items: center;
            padding: 0 25px;
            text-decoration: none;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .custom-input-group .btn-nova:hover {
            background-color: #7a947d;
            color: white;
        }

        /* Rodapé com botões padronizados e espaçados */
        .form-footer-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 15px;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #E2E8F0;
        }

        .btn-action-save, .btn-action-cancel {
            flex: 0 0 200px;
            text-align: center;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-action-save {
            background-color: #8BA88E;
            border: none;
            color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .btn-action-save:hover {
            background-color: #7a947d;
            color: white;
            transform: translateY(-1px);
        }

        .btn-action-cancel {
            background-color: #F8FAFC;
            border: 1px solid #CBD5E1;
            color: #64748B;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-action-cancel:hover {
            background-color: #F1F5F9;
            color: #475569;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <header class="page-header mb-4">
            <div class="header-title-group">
                <a href="/profissionais" class="btn-back">
                    <img src="{{ asset('images/paciente/Arrow 1.svg') }}" alt="Voltar">
                </a>
                <div>
                    <h1 class="page-title">Novo Profissional</h1>
                    <p class="page-subtitle">Preencha os dados do novo cadastro</p>
                </div>
            </div>
        </header>

        <div class="card bg-white p-4 rounded shadow-sm border-0">
            @if (session('mensagem'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('mensagem') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action='/profissionais' id="formProfissional">
                @csrf

                <label class="form-label fw-bold">Qual o tipo de cadastro?</label>
                <div class="type-selector">
                    <label>
                        <input type="radio" name="tipo_profissional" value="medico" id="tipo_medico" checked
                            onchange="controlarCampos()">
                        <div class="type-btn">👨‍⚕️ Médico(a)</div>
                    </label>
                    <label>
                        <input type="radio" name="tipo_profissional" value="secretaria" id="tipo_secretaria"
                            onchange="controlarCampos()">
                        <div class="type-btn">📋 Secretário(a)</div>
                    </label>
                </div>

                <div class="mb-4">
                    <label for="nome" class="form-label fw-bold">Nome Completo</label>
                    <input type="text" id="nome" name="nome" class="form-control" required maxlength="255"
                        value="{{ old('nome') }}">
                </div>

                <div class="row mb-4">
                    <div class="col-md-6" id="div_cpf">
                        <label for="cpf" class="form-label fw-bold">CPF</label>
                        <input type="text" id="cpf" name="cpf" class="form-control"
                            placeholder="000.000.000-00" required maxlength="14" value="{{ old('cpf') }}"
                            oninput="mascaraCPF(this)">
                    </div>
                    <div class="col-md-6" id="div_crm">
                        <label for="crm" class="form-label fw-bold">CRM</label>
                        <input type="text" id="crm" name="crm" class="form-control" placeholder="Ex: 123456-SP"
                            maxlength="20" value="{{ old('crm') }}">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="telefone" class="form-label fw-bold">Telefone</label>
                        <input type="text" id="telefone" name="telefone" class="form-control"
                            placeholder="(00) 00000-0000" required maxlength="15" value="{{ old('telefone') }}"
                            oninput="mascaraTelefone(this)">
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label fw-bold">E-mail</label>
                        <input type="email" id="email" name="email" class="form-control" required maxlength="255"
                            value="{{ old('email') }}">
                    </div>
                </div>

                <div class="mb-5" id="div_especialidade">
                    <label class="form-label fw-bold">Especialidade</label>

                    <div class="custom-input-group">
                        <select id="especialidade_id" name="especialidade_id" class="form-select">
                            <option value="" disabled selected>Selecione a especialidade...</option>
                            @foreach ($especialidades as $especialidade)
                                <option value="{{ $especialidade->id }}"
                                    {{ old('especialidade_id') == $especialidade->id ? 'selected' : '' }}>
                                    {{ $especialidade->nome }}</option>
                            @endforeach
                        </select>

                        <a href="/especialidades/create?redirect_to={{ urlencode(url()->current()) }}" class="btn-nova">
                            + Nova
                        </a>
                    </div>
                </div>

                <!-- Botões padronizados e com espaçamento -->
                <div class="form-footer-actions">
                    <a href="/profissionais" class="btn-action-cancel">Cancelar</a>
                    <button type="submit" class="btn-action-save">Salvar Profissional</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function mascaraCPF(input) {
            let value = input.value.replace(/\D/g, "");
            if (value.length > 11) value = value.slice(0, 11);
            value = value.replace(/(\d{3})(\d)/, "$1.$2");
            value = value.replace(/(\d{3})(\d)/, "$1.$2");
            value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
            input.value = value;
        }

        function mascaraTelefone(input) {
            let value = input.value.replace(/\D/g, "");
            if (value.length > 11) value = value.slice(0, 11);
            value = value.replace(/^(\d{2})(\d)/g, "($1) $2");
            value = value.replace(/(\d)(\d{4})$/, "$1-$2");
            input.value = value;
        }

        function controlarCampos() {
            const isMedico = document.getElementById('tipo_medico').checked;
            const inputCrm = document.getElementById('crm');
            const divCrm = document.getElementById('div_crm');
            const divEsp = document.getElementById('div_especialidade');

            if (isMedico) {
                divCrm.style.display = 'block';
                inputCrm.required = true;
                divEsp.style.display = 'block';
            } else {
                divCrm.style.display = 'none';
                inputCrm.required = false;
                inputCrm.value = "";
                divEsp.style.display = 'none';
                document.getElementById('especialidade_id').value = "";
            }
        }

        window.onload = function() {
            controlarCampos();
            mascaraCPF(document.getElementById('cpf'));
            mascaraTelefone(document.getElementById('telefone'));
        };
    </script>
@endsection