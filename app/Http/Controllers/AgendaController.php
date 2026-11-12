<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        $hoje = Carbon::now('America/Sao_Paulo');

        $mes = $request->input('mes', $hoje->month);
        $ano = $request->input('ano', $hoje->year);

        if ($request->has('dia')) {
            $dia = $request->input('dia');
        } else {
            $dia = ($mes == $hoje->month && $ano == $hoje->year) ? $hoje->day : 1;
        }

        $dataSelecionada = Carbon::createFromDate($ano, $mes, $dia, 'America/Sao_Paulo');
        $primeiroDiaDoMes = $dataSelecionada->copy()->startOfMonth();
        
        $mesAnterior = $primeiroDiaDoMes->copy()->subMonth();
        $mesSeguinte = $primeiroDiaDoMes->copy()->addMonth();

        $diasNoMes = $primeiroDiaDoMes->daysInMonth;
        $primeiroDiaSemana = $primeiroDiaDoMes->dayOfWeek;

        // Lista pré-definida de horários da clínica
        $horarios = [
            '09:00',
            '10:00',
            '11:00',
            '12:00',
            '14:00',
            '15:00',
            '16:00',
            '17:00',
        ];

        return view('agenda', compact(
            'dataSelecionada', 
            'primeiroDiaDoMes',
            'mesAnterior', 
            'mesSeguinte', 
            'diasNoMes', 
            'primeiroDiaSemana',
            'hoje',
            'horarios'
        ));
    }

    public function create(Request $request)
    {
        // Já captura a data e o horário que vieram do botão "Agendar"
        $data = $request->input('data');
        $horario = $request->input('horario');

        // Quando você criar a view de cadastro, basta retorná-la aqui:
        // return view('agenda-criar', compact('data', 'horario'));
        return "Tela de criar agendamento — Data: {$data} | Horário: {$horario}";
    }
}