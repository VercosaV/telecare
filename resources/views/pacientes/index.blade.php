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
            @foreach($pacientes as $p)
                <article class="patient-card">
                    {{-- Usa a foto salva no banco se existir, senão usa o avatar padrão --}}
                    @if($p->foto)
                        <img src="{{ asset('storage/' . $p->foto) }}" alt="Foto do Paciente" class="patient-avatar">
                    @else
                        <img src="{{ asset('images/paciente/acount.png') }}" alt="Foto do Paciente" class="patient-avatar">
                    @endif
                    
                    <div class="patient-info">
                        <h2 class="patient-name">{{ $p->nome }}</h2>
                        <div class="patient-meta">
                            <span class="patient-cpf">CPF: {{ $p->cpf ?? 'Não informado' }}</span>
                            <span class="patient-birth">Nascimento: {{ $p->data_nascimento?->format('d/m/Y') ?? 'Não informado' }}</span>
                        </div>  
                    </div>
                    
                    <!-- Contêiner do Botão de Opções e do Menu Suspenso -->
                    <div class="options-container">
                        <button class="btn-options" onclick="toggleDropdown({{ $p->id }}, event)">
                            <img src="{{ asset('images/paciente/More vertical.svg') }}" alt="Opções">
                        </button>

                        <!-- Menu Dropdown -->
                        <div id="dropdown-{{ $p->id }}" class="dropdown-menu">
                            <a href="{{ route('pacientes.edit', $p->id) }}" class="dropdown-item">Editar</a>
                            <a href="#" class="dropdown-item">Agendar</a> <!-- Rota de agendamento a ser criada -->
                            <form action="{{ route('pacientes.destroy', $p->id) }}" method="POST" class="form-delete" onsubmit="return confirm('Tem certeza que deseja excluir o paciente {{ $p->nome }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item item-delete">Excluir</button>
                            </form>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>
    </div>

    <!-- Script para controlar o Menu Dropdown -->
    <script>
        function toggleDropdown(id, event) {
            // Impede que o clique no botão feche o menu imediatamente
            event.stopPropagation();
            
            const dropdown = document.getElementById('dropdown-' + id);
            const isAtivo = dropdown.classList.contains('show');
            const currentCard = dropdown.closest('.patient-card');

            // Fecha todos os dropdowns abertos na tela
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.remove('show');
            });
            
            // Remove a elevação de todos os cards
            document.querySelectorAll('.patient-card').forEach(card => {
                card.classList.remove('elevated');
            });

            // Se o menu clicado não estava aberto, ele abre agora e joga o card para frente
            if (!isAtivo) {
                dropdown.classList.add('show');
                currentCard.classList.add('elevated');
            }
        }

        // Fecha o dropdown ao clicar em qualquer outro lugar da página
        window.addEventListener('click', function(event) {
            if (!event.target.closest('.options-container')) {
                // Remove os menus
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.remove('show');
                });
                
                // Retorna todos os cards pro nível normal
                document.querySelectorAll('.patient-card').forEach(card => {
                    card.classList.remove('elevated');
                });
            }
        });
    </script>
@endsection