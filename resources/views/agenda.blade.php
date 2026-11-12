@extends('layouts.app')

@section('title', 'Agenda - TeleCare')


@section('content')
<!-- Container flex para organizar os 4 painéis da agenda ao lado da barra lateral existente -->
<div class="p-8 w-full min-h-screen bg-[#eef7ff] flex flex-wrap gap-6 items-start justify-center xl:justify-start">
    
    <!-- Coluna Esquerda (Calendário e Próximo Atendimento) -->
    <div class="flex flex-col gap-[72px]">
        
        <!-- Calendário -->
        <div class="relative w-[490px] h-[604px] rounded-[20px] overflow-hidden bg-[#ffffff] shadow-[0_4px_4px_0_rgba(0,_0,_0,_0.25)] shrink-0">
            
            <!-- Título do Mês Dinâmico -->
            <p class="absolute left-12 top-[43px] w-[284px] h-[85px] font-['Inter',_sans-serif] text-[length:48px] font-semibold leading-[48px] text-[#000000] flex flex-col justify-center capitalize">
                <span>{{ $primeiroDiaDoMes->translatedFormat('F Y') }}</span>
            </p>
            
            <!-- Setas Clicáveis -->
            <a href="{{ route('agenda.index', ['mes' => $mesAnterior->month, 'ano' => $mesAnterior->year]) }}" class="absolute left-[377px] top-[78px] w-[25px] h-[25px] z-10 hover:opacity-70 transition">
                <img class="w-full h-full" src="{{ asset('images/dash/setaesquerda.png') }}" alt="Mês anterior">
            </a>
            
            <a href="{{ route('agenda.index', ['mes' => $mesSeguinte->month, 'ano' => $mesSeguinte->year]) }}" class="absolute left-[408px] top-[78px] w-[25px] h-[25px] z-10 hover:opacity-70 transition">
                <img class="w-full h-full" src="{{ asset('images/dash/setadireita.png') }}" alt="Próximo mês">
            </a>

            <!-- Botão Hoje -->
            <div class="absolute left-[360px] top-[25px] w-[90px] h-[35px] hover:opacity-80 transition">
                <div class="absolute left-0 top-0 w-[90px] h-[35px] rounded-[15px] bg-[#95b8a0]"></div>
                <a href="{{ route('agenda.index') }}" class="absolute left-0 top-0 w-[90px] h-[35px] font-['Inter',_sans-serif] text-[length:20px] font-medium leading-[20px] text-[#ffffff] text-center flex flex-col justify-center">Hoje</a>
            </div>

            <!-- Cabeçalho Fixo dos Dias da Semana -->
            <div class="absolute left-[27px] top-[177px] w-[436px] grid grid-cols-7 gap-x-2">
                @foreach(['D', 'S', 'T', 'Q', 'Q', 'S', 'S'] as $diaSemana)
                    <p class="font-['Inter',_sans-serif] text-[20px] font-medium leading-[20px] text-[#000000] text-center">{{ $diaSemana }}</p>
                @endforeach
            </div>

            <!-- Grid Dinâmico dos Números do Calendário -->
            <div class="absolute left-[27px] top-[204px] w-[436px] grid grid-cols-7 gap-y-3 gap-x-2">
                
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
                       class="group flex justify-center items-center rounded-[28px] h-[57px] w-14 cursor-pointer transition-colors {{ $isSelecionado ? 'bg-[#95b8a0]' : 'hover:bg-[#e5e5e5]' }}">
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
        <div class="relative w-[415px] h-[604px] rounded-[20px] overflow-hidden bg-[#ffffff] shadow-[0_4px_4px_0_rgba(0,_0,_0,_0.25)] shrink-0">
            <div class="absolute left-[23px] top-[214px] w-[370px] h-[52px]">
                <div class="absolute left-0 top-0 w-[370px] h-[52px] rounded-[8px] bg-[#ffffff] shadow-[inset_10px_0_0_0_#ff0000,_0_4px_4px_0_rgba(0,_0,_0,_0.25)]"></div>
                <p class="absolute left-[90px] top-0 w-[280px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-bold leading-[18px] tracking-[0] text-[#000000] flex flex-col justify-center"><span>Leonardo Alves</span></p>
                <div class="absolute left-[268px] top-2 w-[90px] h-9 rounded-[8px] bg-[rgba(255,_0,_0,_0.75)]"></div>
                <p class="absolute left-[268px] top-2 w-[90px] h-9 font-['Inter',_sans-serif] text-[length:16px] font-semibold leading-[16px] tracking-[0] text-[#ffffff] text-center flex flex-col justify-center"><span>Limpar</span></p>
            </div>
            <div class="absolute left-[23px] top-[338px] w-[370px] h-[52px]">
                <div class="absolute left-0 top-0 w-[370px] h-[52px] rounded-[8px] bg-[#ffffff] shadow-[inset_10px_0_0_0_#ffff4d,_0_4px_4px_0_rgba(0,_0,_0,_0.25)]"></div>
                <div class="absolute left-[268px] top-2 w-[90px] h-9">
                    <div class="absolute left-0 top-0 w-[90px] h-9 rounded-[8px] bg-[#ffff4d]"></div>
                    <p class="absolute left-0 top-0 w-[90px] h-9 font-['Inter',_sans-serif] text-[length:16px] font-semibold leading-[16px] tracking-[0] text-[#000000] text-center flex flex-col justify-center"><span>Confirmar</span></p>
                </div>
            </div>
            <div class="absolute left-[23px] top-2 w-[370px] h-[568px]">
                <div class="absolute left-0 top-[82px] w-[370px] h-[486px]">
                    <div class="absolute left-0 top-0 w-[370px] h-[52px] rounded-[8px] bg-[#ffffff] shadow-[inset_10px_0_0_0_#098e98,_0_4px_4px_0_rgba(0,_0,_0,_0.25)]"></div>
                    <div class="absolute left-0 top-[62px] w-[370px] h-[52px] rounded-[8px] bg-[#ffffff] shadow-[inset_10px_0_0_0_#098e98,_0_4px_4px_0_rgba(0,_0,_0,_0.25)]"></div>
                    <div class="absolute left-0 top-[186px] w-[370px] h-[52px] rounded-[8px] bg-[#ffffff] shadow-[inset_10px_0_0_0_#519ebc,_0_4px_4px_0_rgba(0,_0,_0,_0.25)]"></div>
                    <div class="absolute left-0 top-[310px] w-[370px] h-[52px] rounded-[8px] bg-[#ffffff] shadow-[inset_10px_0_0_0_#519ebc,_0_4px_4px_0_rgba(0,_0,_0,_0.25)]"></div>
                    <div class="absolute left-0 top-[372px] w-[370px] h-[52px] rounded-[8px] bg-[#ffffff] shadow-[inset_10px_0_0_0_#519ebc,_0_4px_4px_0_rgba(0,_0,_0,_0.25)]"></div>
                    <div class="absolute left-0 top-[434px] w-[370px] h-[52px] rounded-[8px] bg-[#ffffff] shadow-[inset_10px_0_0_0_#17ac57,_0_4px_4px_0_rgba(0,_0,_0,_0.25)]"></div>
                    <p class="absolute left-[9px] top-[434px] w-[69px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-semibold leading-[18px] tracking-[0] text-[#000000] text-center flex flex-col justify-center"><span>17:00</span></p>
                    <p class="absolute left-[9px] top-[372px] w-[69px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-semibold leading-[18px] tracking-[0] text-[#000000] text-center flex flex-col justify-center"><span>16:00</span></p>
                    <p class="absolute left-[9px] top-[310px] w-[69px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-semibold leading-[18px] tracking-[0] text-[#000000] text-center flex flex-col justify-center"><span>15:00</span></p>
                    <p class="absolute left-[9px] top-[248px] w-[69px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-semibold leading-[18px] tracking-[0] text-[#000000] text-center flex flex-col justify-center"><span>14:00</span></p>
                    <p class="absolute left-[9px] top-[186px] w-[69px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-semibold leading-[18px] tracking-[0] text-[#000000] text-center flex flex-col justify-center"><span>12:00</span></p>
                    <p class="absolute left-[9px] top-[124px] w-[69px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-semibold leading-[18px] tracking-[0] text-[#000000] text-center flex flex-col justify-center"><span>11:00</span></p>
                    <p class="absolute left-[9px] top-[62px] w-[69px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-semibold leading-[18px] tracking-[0] text-[#000000] text-center flex flex-col justify-center"><span>10:00</span></p>
                    <p class="absolute left-[9px] top-0 w-[69px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-semibold leading-[18px] tracking-[0] text-[#000000] text-center flex flex-col justify-center"><span>09:00</span></p>
                    <p class="absolute left-[90px] top-[434px] w-[280px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-bold leading-[18px] tracking-[0] text-[#000000] flex flex-col justify-center"><span>Livre</span></p>
                    <p class="absolute left-[90px] top-[372px] w-[280px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-bold leading-[18px] tracking-[0] text-[#000000] flex flex-col justify-center"><span>Otávio Neves</span></p>
                    <p class="absolute left-[90px] top-[310px] w-[280px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-bold leading-[18px] tracking-[0] text-[#000000] flex flex-col justify-center"><span>Bruna Martins</span></p>
                    <p class="absolute left-[90px] top-[248px] w-[280px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-bold leading-[18px] tracking-[0] text-[#000000] flex flex-col justify-center"><span>Paulo Tomiazzi</span></p>
                    <p class="absolute left-[90px] top-[186px] w-[280px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-bold leading-[18px] tracking-[0] text-[#000000] flex flex-col justify-center"><span>Ingrid Bonfim</span></p>
                    <p class="absolute left-[90px] top-[62px] w-[280px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-bold leading-[18px] tracking-[0] text-[#000000] flex flex-col justify-center"><span>Joana Guedes</span></p>
                    <p class="absolute left-[90px] top-0 w-[280px] h-[52px] font-['Inter',_sans-serif] text-[length:18px] font-bold leading-[18px] tracking-[0] text-[#000000] flex flex-col justify-center"><span>Pedro Silva</span></p>
                </div>
                <p class="absolute left-0 top-[34px] w-[380px] h-[55px] font-['Inter',_sans-serif] text-[length:14px] font-medium leading-[14px] text-[#000000] flex flex-col justify-center"><span>Mostrar: Todos, Livres, Ocupados</span></p>
                <p class="absolute left-0 top-0 w-[370px] h-[51px] font-['Inter',_sans-serif] text-[length:22px] font-medium leading-[22px] text-[#000000] flex flex-col justify-center capitalize">
                    <span>Horários {{ $dataSelecionada->translatedFormat('d \d\e F, l') }}</span>
                </p>
                <div class="absolute left-[268px] top-[152px] w-[90px] h-9 rounded-[8px] bg-[#098e98]"></div>
                <div class="absolute left-[268px] top-[276px] w-[90px] h-9 rounded-[8px] bg-[#519ebc]"></div>
                <div class="absolute left-[268px] top-[400px] w-[90px] h-9 rounded-[8px] bg-[#519ebc]"></div>
                <div class="absolute left-[268px] top-[462px] w-[90px] h-9 rounded-[8px] bg-[#519ebc]"></div>
                <div class="absolute left-[268px] top-[524px] w-[90px] h-9 rounded-[8px] bg-[rgba(23,_172,_87,_0.9)]"></div>
                <div class="absolute left-[268px] top-[90px] w-[90px] h-9 rounded-[8px] bg-[#098e98]"></div>
                <p class="absolute left-[268px] top-[152px] w-[90px] h-9 font-['Inter',_sans-serif] text-[length:16px] font-semibold leading-[16px] tracking-[0] text-[#ffffff] text-center flex flex-col justify-center"><span>Detalhes</span></p>
                <p class="absolute left-[268px] top-[276px] w-[90px] h-9 font-['Inter',_sans-serif] text-[length:16px] font-semibold leading-[16px] tracking-[0] text-[#ffffff] text-center flex flex-col justify-center"><span>Alterar</span></p>
                <p class="absolute left-[268px] top-[400px] w-[90px] h-9 font-['Inter',_sans-serif] text-[length:16px] font-semibold leading-[16px] tracking-[0] text-[#ffffff] text-center flex flex-col justify-center"><span>Alterar</span></p>
                <p class="absolute left-[268px] top-[462px] w-[90px] h-9 font-['Inter',_sans-serif] text-[length:16px] font-semibold leading-[16px] tracking-[0] text-[#ffffff] text-center flex flex-col justify-center"><span>Alterar</span></p>
                <a class="absolute left-[268px] top-[524px] w-[90px] h-9 flex justify-center items-center" href="#">
                    <span class="shrink-0 w-[90px] h-9 font-['Inter',_sans-serif] text-[length:16px] font-semibold leading-[16px] tracking-[0] text-[#ffffff] text-center flex flex-col justify-center"><span>Agendar</span></span>
                </a>
                <p class="absolute left-[268px] top-[90px] w-[90px] h-9 font-['Inter',_sans-serif] text-[length:16px] font-semibold leading-[16px] tracking-[0] text-[#ffffff] text-center flex flex-col justify-center"><span>Detalhes</span></p>
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