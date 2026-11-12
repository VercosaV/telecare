@extends('layouts.app')

@section('title', 'Agenda - TeleCare')


@section('content')
<!-- organizar cards com painel lateral -->
<div class="p-10 w-full min-h-screen bg-[#eef7ff] flex flex-wrap gap-16 items-start justify-center xl:justify-start">
    
    <!-- Coluna Esquerda -->
    <div class="flex flex-col gap-[72px]">
        
        <!-- Calendário -->
        <div class="relative w-[490px] h-[605px] rounded-[20px] overflow-hidden bg-[#ffffff] shadow-[0_4px_4px_0_rgba(0,_0,_0,_0.25)] shrink-0">
            
            <p class="absolute left-12 top-[43px] w-[284px] h-[85px] font-['Inter',_sans-serif] text-[length:48px] font-semibold leading-[48px] text-[#000000] flex flex-col justify-center capitalize">
                <span>{{ $primeiroDiaDoMes->translatedFormat('F Y') }}</span>
            </p>
            
            <a href="{{ route('agenda.index', ['mes' => $mesAnterior->month, 'ano' => $mesAnterior->year]) }}" class="absolute left-[370px] top-[110px] w-[35px] h-[35px] z-10 hover:opacity-70 transition">
                <img class="w-full h-full" src="{{ asset('images/dash/setaesquerda.png') }}" alt="Mês anterior">
            </a>
            
            <a href="{{ route('agenda.index', ['mes' => $mesSeguinte->month, 'ano' => $mesSeguinte->year]) }}" class="absolute left-[410px] top-[110px] w-[35px] h-[35px] z-10 hover:opacity-70 transition">
                <img class="w-full h-full" src="{{ asset('images/dash/setadireita.png') }}" alt="Próximo mês">
            </a>
            <!-- botao hoje -->
            <div class="absolute left-[360px] top-[50px] w-[90px] h-[35px] hover:opacity-80 transition">
                <div class="absolute left-0 top-0 w-[90px] h-[35px] rounded-[15px] bg-[#098e98]"></div>
                <a href="{{ route('agenda.index') }}" class="absolute left-0 top-0 w-[90px] h-[35px] font-['Inter',_sans-serif] text-[length:20px] font-medium leading-[20px] text-[#ffffff] text-center flex flex-col justify-center">Hoje</a>
            </div>
            <div class="absolute left-[27px] top-[180px] w-[436px] grid grid-cols-7 gap-x-2">
                @foreach(['D', 'S', 'T', 'Q', 'Q', 'S', 'S'] as $diaSemana)
                    <p class="font-['Inter',_sans-serif] text-[22px] font-extrabold leading-[20px] text-[#000000] text-center">{{ $diaSemana }}</p>
                @endforeach
            </div>

            <!-- Grid Dinâmico dos Números do Calendário -->
            <div class="absolute left-[27px] top-[220px] w-[436px] grid grid-cols-7 gap-y-3 gap-x-2">
                
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
        <div class="relative w-[490px] h-[114px] rounded-[20px] overflow-hidden bg-[#ffffff] shadow-[0_4px_4px_0_rgba(0,_0,_0,_0.25)] shrink-0">
            <img class="absolute left-3.5 top-[45px] w-[55px] h-[55px] object-cover rounded-full" src="{{ asset('images/dash/unnamed1.png') }}" alt="unnamed 1">
            <p class="absolute left-3.5 top-0 w-[468px] h-[45px] font-['Inria_Sans',_sans-serif] text-[length:24px] font-normal leading-[31px] text-[#000000] flex flex-col justify-center"><span>PRÓXIMO ATENDIMENTO</span></p>
            <p class="absolute left-[83px] top-[45px] w-[196px] h-[25px] font-['Inria_Sans',_sans-serif] text-[length:22px] font-bold leading-[22px] tracking-[0] text-[#000000] flex flex-col justify-center"><span>Ingrid Bonfim</span></p>
            <p class="absolute left-[330px] top-[39px] w-32 h-[25px] font-['Inria_Sans',_sans-serif] text-[length:18px] font-normal leading-[18px] tracking-[0] text-[#000000] text-center flex flex-col justify-center"><span>12:00 - 12:45</span></p>
            <div class="absolute left-[316px] top-[68px] w-[155px] h-[30px] rounded-[100px] bg-[#0b9095]"></div>
            <a class="absolute left-[316px] top-[68px] w-[155px] h-[30px] font-['Inria_Sans',_sans-serif] text-[length:15px] font-bold leading-[15px] tracking-[0] text-[#ffffff] text-center flex flex-col justify-center" href="#"><span>INICIAR AGORA</span></a>
            <div class="absolute left-[217px] top-[47px] w-[55px] h-[21px] rounded-[100px] bg-[#67d449]"></div>
            <p class="absolute left-[217px] top-[47px] w-[55px] h-[21px] font-['Inria_Sans',_sans-serif] text-[length:12px] font-normal leading-[12px] text-[#ffffff] text-center flex flex-col justify-center"><span>Online</span></p>
            <p class="absolute left-[83px] top-[70px] w-[188px] h-[37px] font-['Inria_Sans',_sans-serif] text-[length:14px] font-normal leading-[14px] text-[#000000] flex flex-col justify-center"><span>Motivo: Paciente com dores articulares e mal-estar</span></p>
        </div>

    </div>

    <!-- Coluna Direita (Lista de Horários e Legendas) -->
    <div class="flex flex-col gap-[72px]">

        <!-- Lista de Horários -->
        <div class="w-[415px] h-[605px] rounded-[20px] bg-[#ffffff] shadow-[0_4px_4px_0_rgba(0,_0,_0,_0.25)] shrink-0 px-[23px] pt-[15px] pb-[20px] flex flex-col justify-between">
            
            <!-- Cabeçalho da Lista -->
            <div class="shrink-0">
                <p class="font-['Inter',_sans-serif] text-[22px] font-medium leading-[26px] text-[#000000] capitalize">
                    Horários {{ $dataSelecionada->translatedFormat('d \d\e F, l') }}
                </p>
                <p class="font-['Inter',_sans-serif] text-[14px] font-medium leading-[14px] text-[#000000] mt-1.5">
                    Mostrar: Todos, Livres, Ocupados
                </p>
            </div>

            <!-- Cards de Horários Dinâmicos -->
            <div class="flex flex-col gap-[10px] shrink-0">
                @foreach ($horarios as $horario)
                    <div class="w-full h-[52px] rounded-[8px] bg-[#ffffff] shadow-[inset_10px_0_0_0_#17ac57,_0_4px_4px_0_rgba(0,_0,_0,_0.25)] flex items-center justify-between pl-[18px] pr-[12px]">
                        
                        <div class="flex items-center gap-4">
                            <span class="font-['Inter',_sans-serif] text-[18px] font-semibold leading-[18px] text-[#000000]">
                                {{ $horario }}
                            </span>
                            <span class="font-['Inter',_sans-serif] text-[18px] font-bold leading-[18px] text-[#000000]">
                                Livre
                            </span>
                        </div>

                        <a href="{{ route('agenda.create', ['data' => $dataSelecionada->format('Y-m-d'), 'horario' => $horario]) }}" 
                           class="w-[90px] h-9 rounded-[8px] bg-[#17ac57] hover:bg-[#139149] transition flex items-center justify-center font-['Inter',_sans-serif] text-[16px] font-semibold leading-[16px] text-[#ffffff]">
                            Agendar
                        </a>

                    </div>
                @endforeach
            </div>

        </div>
        <!-- Legendas -->
        <div class="relative w-[415px] h-[114px] rounded-[20px] overflow-hidden bg-[#ffffff] shadow-[0_4px_4px_0_rgba(0,_0,_0,_0.25)] shrink-0">
            <p class="absolute left-8 top-1 w-[110px] h-[25px] font-['Inter',_sans-serif] text-[length:18px] font-semibold leading-[27px] text-[#000000]">Legendas:</p>
            <div class="absolute left-8 top-10 w-2.5 h-2.5 rounded-full bg-[#098e98]"></div>
            <div class="absolute left-8 top-[89px] w-2.5 h-2.5 rounded-full bg-[#519ebc]"></div>
            <div class="absolute left-8 top-16 w-2.5 h-[11px] rounded-full bg-[#ff4040]"></div>
            <div class="absolute left-[231px] top-[69px] w-2.5 h-2.5 rounded-full bg-[#2fb568]"></div>
            <div class="absolute left-[231px] top-[42px] w-2.5 h-2.5 rounded-full bg-[#ffff4d]"></div>
            <p class="absolute left-[47px] top-[37px] font-['Inter',_sans-serif] text-[length:15px] font-normal leading-[15px] text-[#000000] whitespace-nowrap">Concluído</p>
            <p class="absolute left-[47px] top-[86px] font-['Inter',_sans-serif] text-[length:15px] font-normal leading-[15px] text-[#000000] whitespace-nowrap">Confirmado</p>
            <p class="absolute left-[47px] top-[60px] w-[118px] h-[17px] font-['Inter',_sans-serif] text-[length:15px] font-normal leading-[15px] text-[#000000] flex flex-col justify-end"><span>Cancelado</span></p>
            <p class="absolute left-[246px] top-[66px] w-[97px] h-[17px] font-['Inter',_sans-serif] text-[length:15px] font-normal leading-[15px] text-[#000000]">Horário Livre </p>
            <p class="absolute left-[246px] top-[39px] font-['Inter',_sans-serif] text-[length:15px] font-normal leading-[15px] text-[#000000] whitespace-nowrap">Pendente</p>
        </div>

    </div>
</div>
@endsection