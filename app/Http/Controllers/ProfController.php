<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profissionais;
use App\Models\Especialidade;

class ProfController extends Controller
{
    public function index()
    {
        $profissionais = Profissionais::all();
        return view('profissionais.index', compact('profissionais'));
    }
    
    public function create()
    {
        $especialidades = Especialidade::all();
        return view('profissionais.create', compact('especialidades'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();

        if ($dados['tipo_profissional'] === 'secretaria') {
            $dados['crm'] = null;
            $dados['especialidade_id'] = null; 
        } 

        if (Profissionais::create($dados)) {
            return redirect()->route('profissionais.index')->with('mensagem', 'Cadastrado com sucesso!');
        } else {
            return redirect()->route('profissionais.index')->with('mensagem', 'Erro ao cadastrar!');
        }
    }
}
