<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        // 1. Pega a data de hoje forçando o fuso horário do Brasil para evitar adiantar 1 dia de noite
        $hoje = Carbon::now('America/Sao_Paulo');

        // 2. Recebe o mês e o ano da URL. Se não houver, usa o atual
        $mes =$request->input('mes', $hoje->month);$ano = $request->input('ano',$hoje->year);

        // 3. Define o dia selecionado. 
        // Se a pessoa clicou em um dia específico, usa ele.
        // Se acabou de entrar na tela e está no mês atual, seleciona hoje. Se mudou o mês na seta, vai para o dia 1.
        if ($request->has('dia')) {
            $dia =$request->input('dia');
        } else {
            $dia = ($mes == $hoje->month &&$ano == $hoje->year) ?$hoje->day : 1;
        }

        // 4. Data exata selecionada que aparecerá no título do painel da direita
        $dataSelecionada = Carbon::createFromDate($ano, $mes,$dia, 'America/Sao_Paulo');
        
        // 5. Variável base para calcular a grade do mês inteiro na esquerda
        $primeiroDiaDoMes =$dataSelecionada->copy()->startOfMonth();
        
        $mesAnterior =$primeiroDiaDoMes->copy()->subMonth();
        $mesSeguinte =$primeiroDiaDoMes->copy()->addMonth();

        $diasNoMes =$primeiroDiaDoMes->daysInMonth;
        $primeiroDiaSemana =$primeiroDiaDoMes->dayOfWeek; // 0 = Domingo, 1 = Segunda...

        return view('agenda', compact(
            'dataSelecionada', 
            'primeiroDiaDoMes',
            'mesAnterior', 
            'mesSeguinte', 
            'diasNoMes', 
            'primeiroDiaSemana',
            'hoje'
        ));
    }
}