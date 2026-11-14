@extends('layouts.app')

@section('title', 'Agenda - TeleCare')

@section('content')
<!-- organizar cards com painel lateral -->
<div class="p-10 w-full min-h-screen bg-[#eef7ff] flex flex-wrap gap-16 items-start justify-center xl:justify-start">
    
    <!-- Coluna Esquerda -->
    <div class="flex flex-col gap-[30px]">
        
        <!-- Calendário -->
        <div class="relative w-[580px] h-[650px] rounded-[20px] overflow-hidden bg-[#ffffff] shadow-[0_4px_4px_0_rgba(0,_0,_0,_0.25)] shrink-0">
            
            <!-- Título do Mês e Ano -->
            <div class="absolute left-[65px] top-[40px] font-['Inter',_sans-serif] text-[#000000] flex flex-col capitalize">
                <span class="text-[40px] font-normal leading-[40px] text-[#262626]">{{ $primeiroDiaDoMes->translatedFormat('F') }}</span>
                <span class="text-[48px] font-black leading-[48px]">{{ $primeiroDiaDoMes->format('Y') }}</span>
            </div>
            
            <!-- Botão Hoje -->
            <a href="{{ route('agenda.index') }}" class="absolute right-[70px] top-[40px] w-[90px] h-[35px] rounded-[15px] bg-[#098e98] hover:opacity-80 transition flex items-center justify-center font-['Inter',_sans-serif] text-[20px] font-medium text-[#ffffff]">
                Hoje
            </a>

            <!-- Setas de Navegação -->
            <div class="absolute right-[70px] top-[94px] flex gap-4 z-10">
                <a href="{{ route('agenda.index', ['mes' => $mesAnterior->month, 'ano' => $mesAnterior->year]) }}" class="w-[35px] h-[35px] hover:opacity-70 transition">
                    <img class="w-full h-full" src="{{ asset('images/dash/setaesquerda.png') }}" alt="Mês anterior">
                </a>
                <a href="{{ route('agenda.index', ['mes' => $mesSeguinte->month, 'ano' => $mesSeguinte->year]) }}" class="w-[35px] h-[35px] hover:opacity-70 transition">
                    <img class="w-full h-full" src="{{ asset('images/dash/setadireita.png') }}" alt="Próximo mês">
                </a>
            </div>

            <!-- Cabeçalho dos Dias da Semana -->
            <div class="absolute left-[50px] right-[50px] top-[170px] grid grid-cols-7 gap-x-2">
                @foreach(['D', 'S', 'T', 'Q', 'Q', 'S', 'S'] as $diaSemana)
                    <p class="font-['Inter',_sans-serif] text-[24px] font-extrabold text-[#000000] text-center">{{ $diaSemana }}</p>
                @endforeach
            </div>

            <!-- Grid Dinâmico dos Números do Calendário -->
            <div class="absolute left-[50px] right-[50px] top-[230px] grid grid-cols-7 gap-y-3 gap-x-2 justify-items-center">
                
                <!-- Espaços em branco antes do dia 1 -->
                @for ($i = 0; $i < $primeiroDiaSemana; $i++)
                    <div class="h-[57px] w-14"></div>
                @endfor

                <!-- Dias do mês Clicáveis -->
                @for ($dia = 1; $dia <= $diasNoMes; $dia++)
                    @php
                        // Verifica se é o dia que o usuário clicou (ou o atual)
                        $isSelecionado = ($dia == $dataSelecionada->day);
                    @endphp
                    
                    <a href="{{ route('agenda.index', ['dia' => $dia, 'mes' => $primeiroDiaDoMes->month, 'ano' => $primeiroDiaDoMes->year]) }}" 
                       class="group flex justify-center items-center rounded-[28px] h-[57px] w-14 cursor-pointer transition-colors {{ $isSelecionado ? 'bg-[#066a72]' : 'hover:bg-[#e5e5e5]' }}">
                        <p class="font-['Inter',_sans-serif] text-[24px] font-medium leading-[24px] text-center {{ $isSelecionado ? 'text-[#ffffff]' : 'text-[#262626] group-hover:text-[#000000]' }}">
                            {{ $dia }}
                        </p>
                    </a>
                @endfor
                
            </div>
            
        </div>

        <!-- Próximo Atendimento -->
        <div class="w-[580px] h-[140px] rounded-[20px] bg-[#ffffff] shadow-[0_4px_4px_0_rgba(0,_0,_0,_0.25)] shrink-0 pl-[35px] pr-[40px] py-[15px] flex flex-col justify-center gap-1">
            
            <!-- Título -->
            <p class="font-['Inria_Sans',_sans-serif] text-[20px] uppercase text-[#000000]">
                Próximo Atendimento
            </p>

            <!-- Conteúdo Principal -->
            <div class="flex justify-between items-center mt-1">
                
                <!-- Lado Esquerdo (Foto e Informações) -->
                <div class="flex items-center gap-3">
                    <img class="w-[55px] h-[55px] object-cover rounded-full bg-gray-200" src="{{ asset('images/dash/unnamed1.png') }}" alt="Ingrid Bonfim">
                    
                    <div class="flex flex-col justify-center">
                        <div class="flex items-center gap-2">
                            <span class="font-['Inria_Sans',_sans-serif] text-[22px] font-bold text-[#000000]">Ingrid Bonfim</span>
                            <span class="bg-[#67d449] text-[#ffffff] font-['Inria_Sans',_sans-serif] text-[12px] px-2 py-0.5 rounded-[100px]">Online</span>
                        </div>
                        <p class="font-['Inria_Sans',_sans-serif] text-[14px] text-[#000000] leading-tight max-w-[200px]">
                            Motivo: Paciente com dores articulares e mal-estar
                        </p>
                    </div>
                </div>
                <!-- Botão Iniciar -->
                <div class="flex flex-col items-center gap-1">
                    <span class="font-['Inria_Sans',_sans-serif] text-[18px] text-[#000000]">12:00 - 12:45</span>
                    <a href="#" class="bg-[#0b9095] hover:opacity-80 transition text-[#ffffff] font-['Inria_Sans',_sans-serif] text-[15px] font-bold w-[145px] h-[30px] rounded-[100px] flex items-center justify-center">
                        INICIAR AGORA
                    </a>
                </div>

            </div>
            
        </div>

    </div>

    <!-- Coluna da direita -->
    <div class="flex flex-col gap-[30px]">

        <!-- Lista de Horários -->
        <div class="w-[415px] h-[650px] rounded-[20px] bg-[#ffffff] shadow-[0_4px_4px_0_rgba(0,_0,_0,_0.25)] shrink-0 px-[23px] pt-[15px] pb-[20px] flex flex-col justify-between">
            
            <!-- Cabeçalho da Lista -->
            <div class="shrink-0">
                <p class="font-['Inter',_sans-serif] text-[22px] font-medium leading-[26px] text-[#000000] capitalize">
                    Horários {{ $dataSelecionada->translatedFormat('d \d\e F, l') }}
                </p>
                <p class="font-['Inter',_sans-serif] text-[15px] font-medium leading-[14px] text-[#000000] mt-1.5">
                    Mostrar: Todos, Livres, Ocupados
                </p>
            </div>

            <!-- Cards de Horários Dinâmicos -->
            <div class="flex flex-col gap-[13px] shrink-0">
                @foreach ($horarios as $horario)
                    <div class="w-full h-[56px] rounded-[12px] bg-[#ffffff] shadow-[inset_10px_0_0_0_#17ac57,_0_4px_4px_0_rgba(0,_0,_0,_0.25)] flex items-center justify-between pl-[18px] pr-[12px]">
                        
                        <div class="flex items-center gap-4">
                            <span class="font-['Inter',_sans-serif] text-[18px] font-semibold leading-[18px] text-[#000000]">
                                {{ $horario }}
                            </span>
                            <span class="font-['Inter',_sans-serif] text-[18px] font-bold leading-[18px] text-[#000000]">
                                Livre
                            </span>
                        </div>

                        <a href="{{ route('agenda.create', ['data' => $dataSelecionada->format('Y-m-d'), 'horario' => $horario]) }}" 
                           class="w-[90px] h-9 rounded-[12px] bg-[#17ac57] hover:bg-[#139149] transition flex items-center justify-center font-['Inter',_sans-serif] text-[16px] font-semibold leading-[16px] text-[#ffffff]">
                            Agendar
                        </a>

                    </div>
                @endforeach
            </div>

        </div>
        
        <!-- Legendas -->
        <div class="relative w-[415px] h-[140px] rounded-[20px] overflow-hidden bg-[#ffffff] shadow-[0_4px_4px_0_rgba(0,_0,_0,_0.25)] shrink-0">
            <p class="absolute left-8 top-3 w-[110px] h-[25px] font-['Inter',_sans-serif] text-[length:18px] font-semibold leading-[27px] text-[#000000]">Legendas:</p>
            <div class="absolute left-8 top-[48px] w-2.5 h-2.5 rounded-full bg-[#098e98]"></div>
            <p class="absolute left-[47px] top-[46px] font-['Inter',_sans-serif] text-[length:15px] font-normal leading-[15px] text-[#000000] whitespace-nowrap">Concluído</p>
            <div class="absolute left-8 top-[74px] w-2.5 h-[11px] rounded-full bg-[#ff4040]"></div>
            <p class="absolute left-[47px] top-[70px] w-[118px] h-[17px] font-['Inter',_sans-serif] text-[length:15px] font-normal leading-[15px] text-[#000000] flex flex-col justify-end"><span>Cancelado</span></p>
            <div class="absolute left-8 top-[99px] w-2.5 h-2.5 rounded-full bg-[#519ebc]"></div>            
            <p class="absolute left-[47px] top-[97px] font-['Inter',_sans-serif] text-[length:15px] font-normal leading-[15px] text-[#000000] whitespace-nowrap">Confirmado</p>
            <div class="absolute left-[231px] top-[48px] w-2.5 h-2.5 rounded-full bg-[#ffff4d]"></div>
            <p class="absolute left-[246px] top-[46px] font-['Inter',_sans-serif] text-[length:15px] font-normal leading-[15px] text-[#000000] whitespace-nowrap">Pendente</p>
            <div class="absolute left-[231px] top-[74px] w-2.5 h-2.5 rounded-full bg-[#2fb568]"></div>
            <p class="absolute left-[246px] top-[72px] w-[97px] h-[17px] font-['Inter',_sans-serif] text-[length:15px] font-normal leading-[15px] text-[#000000]">Horário Livre </p>
        </div>

    </div>
</div>
@endsection