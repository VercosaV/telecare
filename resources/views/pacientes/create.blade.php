@extends('layouts.app')

@section('title', 'Cadastrar Paciente - TeleCare')

@push('styles')
    @vite(['resources/css/paciente/create.css'])
@endpush

@section('content')
    <div class="content-wrapper">

        @if (session('mensagem'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('mensagem') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Verifique os campos abaixo:</strong>
                <ul class="mb-0 mt-1">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Cabeçalho da Página -->
        <header class="page-header">
            <div class="header-title-group">
                <a href="{{ route('pacientes.index') }}" class="btn-back" title="Voltar">
                    <img src="{{ asset('images/paciente/Arrow 1.svg') }}" alt="Voltar">
                </a>
                <div>
                    <h1 class="page-title">Cadastrar Paciente</h1>
                    <p class="page-subtitle">Preencha os campos</p>
                </div>
            </div>
        </header>

        <form id="pacienteForm" action="{{ route('pacientes.store') }}" method="POST" enctype="multipart/form-data" class="patient-form">
            @csrf

            <!-- Seção: Dados do Paciente -->
            <section class="form-card">
                <h2 class="card-title">Dados do Paciente</h2>

                <div class="patient-top-section">
                    <!-- Foto do Paciente -->
                    <div class="photo-upload-column">
                        <img id="photoPreview" class="photo-preview" src="{{ asset('images/paciente/acount.png') }}" alt="Foto do Paciente">
                        <input type="file" id="fotoInput" name="foto" accept="image/*" hidden>
                        <button type="button" class="btn-take-photo" onclick="document.getElementById('fotoInput').click()">
                            <svg width="12" height="10" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 1L3.8 2.5H1.5C0.95 2.5 0.5 2.95 0.5 3.5V10.5C0.5 11.05 0.95 11.5 1.5 11.5H12.5C13.05 11.5 13.5 11.05 13.5 10.5V3.5C13.5 2.95 13.05 2.5 12.5 2.5H10.2L9 1H5ZM7 9.5C5.62 9.5 4.5 8.38 4.5 7C4.5 5.62 5.62 4.5 7 4.5C8.38 4.5 9.5 5.62 9.5 7C9.5 8.38 8.38 9.5 7 9.5Z" stroke="#FF0000" stroke-width="1"/>
                            </svg>
                            TIRAR FOTO
                        </button>
                    </div>

                    <!-- Campos: Nome, Sexo e Data de Nascimento -->
                    <div class="patient-top-fields">
                        <div class="form-group">
                            <label for="nome" class="field-label">Nome *</label>
                            <input type="text" id="nome" name="nome" class="form-control @error('nome') is-invalid @enderror" placeholder="Digite o nome do paciente" value="{{ old('nome') }}" required>
                        </div>

                        <div class="form-grid-2">
                            <div class="form-group">
                                <label for="sexo" class="field-label">Sexo</label>
                                <select id="sexo" name="sexo" class="form-control">
                                    <option value="" disabled selected>Selecione o sexo do paciente</option>
                                    <option value="Masculino" {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="Feminino" {{ old('sexo') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                                    <option value="Outro" {{ old('sexo') == 'Outro' ? 'selected' : '' }}>Outro</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="data_nascimento" class="field-label">Data de Nascimento</label>
                                <input type="text" id="data_nascimento" name="data_nascimento" class="form-control" placeholder="Selecione a data de nasc." onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" value="{{ old('data_nascimento') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Campos: RG, CPF, Telefone, Email, Profissão, Cartão SUS -->
                <div class="form-grid-2">
                    <div class="form-group">
                        <label for="rg" class="field-label">RG</label>
                        <input type="text" id="rg" name="rg" class="form-control" placeholder="Digite o RG do paciente" value="{{ old('rg') }}">
                    </div>

                    <div class="form-group">
                        <label for="cpf" class="field-label">CPF *</label>
                        <input type="text" id="cpf" name="cpf" class="form-control @error('cpf') is-invalid @enderror" placeholder="Somente números (11 dígitos)" maxlength="11" inputmode="numeric" value="{{ old('cpf') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="telefone" class="field-label">Telefone *</label>
                        <div class="phone-input-group">
                            <input type="text" id="ddd" name="ddd" class="form-control input-ddd" placeholder="DDD" maxlength="2" inputmode="numeric" value="{{ old('ddd') }}">
                            <input type="text" id="telefone" name="telefone" class="form-control input-phone @error('telefone') is-invalid @enderror" placeholder="Digite o telefone do paciente" maxlength="15" value="{{ old('telefone') }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="field-label">Email *</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Digite o e-mail do paciente" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="profissao" class="field-label">Profissão</label>
                        <input type="text" id="profissao" name="profissao" class="form-control" placeholder="Digite a profissão do paciente" value="{{ old('profissao') }}">
                    </div>

                    <div class="form-group">
                        <label for="cartao_sus" class="field-label">Cartão SUS</label>
                        <input type="text" id="cartao_sus" name="cartao_sus" class="form-control" placeholder="Digite o Cartão SUS do paciente" value="{{ old('cartao_sus') }}">
                    </div>
                </div>
            </section>

            <!-- Seção: Endereço do Paciente -->
            <section class="form-card">
                <h2 class="card-title">Endereço do Paciente</h2>

                <div class="address-row-top">
                    <div class="form-group">
                        <label for="cep" class="field-label">CEP</label>
                        <input type="text" id="cep" name="cep" class="form-control" placeholder="Digite o CEP" value="{{ old('cep') }}">
                    </div>

                    <div class="form-group">
                        <label for="cidade" class="field-label">Cidade</label>
                        <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Digite a cidade" value="{{ old('cidade') }}">
                    </div>

                    <div class="form-group">
                        <label for="estado" class="field-label">Estado</label>
                        <input type="text" id="estado" name="estado" class="form-control text-center" maxlength="2" placeholder="UF" value="{{ old('estado') }}">
                    </div>
                </div>

                <div class="address-row-middle">
                    <div class="form-group">
                        <label for="logradouro" class="field-label">Logradouro</label>
                        <input type="text" id="logradouro" name="logradouro" class="form-control" placeholder="Digite a rua" value="{{ old('logradouro') }}">
                    </div>
                </div>

                <div class="address-row-bottom">
                    <div class="form-group">
                        <label for="bairro" class="field-label">Bairro</label>
                        <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Digite o bairro" value="{{ old('bairro') }}">
                    </div>

                    <div class="form-group">
                        <label for="numero" class="field-label">Número</label>
                        <input type="text" id="numero" name="numero" class="form-control text-center" value="{{ old('numero') }}">
                    </div>

                    <div class="form-group">
                        <label for="complemento" class="field-label">Complemento</label>
                        <input type="text" id="complemento" name="complemento" class="form-control" placeholder="Ex: Casa, Apto" value="{{ old('complemento') }}">
                    </div>
                </div>
            </section>

            <!-- Rodapé / Ações -->
            <footer class="card-actions">
                <a href="{{ route('pacientes.index') }}" class="btn-action btn-voltar">
                    VOLTAR
                </a>

                <button type="submit" name="action" value="rascunho" class="btn-action btn-rascunho">
                    SALVAR RASCUNHO
                </button>

                <button type="submit" name="action" value="salvar" class="btn-action btn-salvar">
                    SALVAR
                </button>
            </footer>
        </form>
    </div>

    <script>
        // Preview da foto
        document.getElementById('fotoInput').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('photoPreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Garante que o CPF tenha apenas números (regra digits:11 do Controller)
        const cpfInput = document.getElementById('cpf');
        cpfInput.addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '').slice(0, 11);
        });

        // Junta DDD + Telefone antes de enviar para o Controller (campo único 'telefone')
        document.getElementById('pacienteForm').addEventListener('submit', function () {
            const ddd = document.getElementById('ddd').value.replace(/\D/g, '');
            const telInput = document.getElementById('telefone');
            if (ddd && !telInput.value.startsWith('(')) {
                telInput.value = `(${ddd}) ${telInput.value}`.slice(0, 20);
            }
        });
    </script>
@endsection