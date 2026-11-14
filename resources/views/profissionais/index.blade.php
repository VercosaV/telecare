@extends('layouts.app')

@section('title', 'Profissionais - TeleCare')

@push('styles')
    @vite(['resources/css/profissional/index.css'])
@endpush

@section('content')
    <div class="content-wrapper">

        @if (session('mensagem'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('mensagem') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <header class="page-header">
            <div class="header-title-group">
                <a href="/dashboard" class="btn-back">
                    <img src="{{ asset('images/paciente/Arrow 1.svg') }}" alt="Voltar">
                </a>
                <div>
                    <h1 class="page-title">Lista de Profissionais</h1>
                    <p class="page-subtitle">Consulte os Profissionais Cadastrados</p>
                </div>
            </div>
            <a href="/profissionais/create" class="btn-novo">
                Novo
            </a>
        </header>

        <section class="patient-list">
            @foreach($profissionais as $pf)
                <article class="patient-card">
                    <img src="{{ asset('images/paciente/acount.png') }}" alt="Avatar do Profissional" class="patient-avatar">
                    
                    <div class="patient-info">
                        <h2 class="patient-name">{{ $pf->nome }}</h2>
                        <div class="patient-meta">
                            <span class="patient-cpf">Especialidade: {{ $pf->tipo_profissional === 'medico(a)' && $pf->especialidade ? $pf->especialidade->nome : 'Secretário(a)' }}</span>
                            
                            @if($pf->tipo_profissional === 'medico' && $pf->crm)
                                <span class="patient-birth" style="margin-left: 15px;">CRM: {{ $pf->crm }}</span>
                            @endif
                        </div>  
                    </div>
                    
                    <div class="options-container">
                        <button class="btn-options" onclick="toggleDropdown({{ $pf->id }}, event)">
                            <img src="{{ asset('images/paciente/More vertical.svg') }}" alt="Opções">
                        </button>

                        <div id="dropdown-{{ $pf->id }}" class="dropdown-menu">
                            <a href="/profissionais/{{ $pf->id }}/edit" class="dropdown-item">Editar</a>
                            <form action="/profissionais/{{ $pf->id }}" method="POST" class="form-delete" onsubmit="return confirm('Tem certeza que deseja excluir o profissional {{ $pf->nome }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item item-delete" style="color: red;">Excluir</button>
                            </form>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>
    </div>

    <script>
        function toggleDropdown(id, event) {
            event.stopPropagation();
            
            const dropdown = document.getElementById('dropdown-' + id);
            const isAtivo = dropdown.classList.contains('show');
            const currentCard = dropdown.closest('.patient-card');

            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.remove('show');
            });
            
            document.querySelectorAll('.patient-card').forEach(card => {
                card.classList.remove('elevated');
            });

            if (!isAtivo) {
                dropdown.classList.add('show');
                currentCard.classList.add('elevated');
            }
        }

        window.addEventListener('click', function(event) {
            if (!event.target.closest('.options-container')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.remove('show');
                });
                
                document.querySelectorAll('.patient-card').forEach(card => {
                    card.classList.remove('elevated');
                });
            }
        });
    </script>
@endsection