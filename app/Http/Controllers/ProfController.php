<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use App\Models\Profissionais;
use Illuminate\Http\Request;

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

    public function show(int $id)
    {
        // Busca o profissional pelo ID
        $profissionais = Profissionais::findOrFail($id);

        return view('profissionais.show', compact('profissionais'));
    }

    public function edit(int $id)
    {
        $profissionais = Profissionais::findOrFail($id);

        $especialidades = Especialidade::all();

        return view('profissionais.edit', compact('profissionais', 'especialidades'));
    }

    public function update(Request $request, int $id)
    {
        $profissionais = Profissionais::findOrFail($id);
        $dados = $request->all();

        // Repete a mesma regra do store para garantir que os dados fiquem nulos ao trocar de Médico para Secretária
        if ($dados['tipo_profissional'] === 'secretaria') {
            $dados['crm'] = null;
            $dados['especialidade_id'] = null;
        }

        if ($profissionais->update($dados)) {
            return redirect()->route('profissionais.index')->with('mensagem', 'Profissional alterado com Sucesso!');
        } else {
            return redirect()->route('profissionais.index')->with('mensagem', 'Erro ao alterar o Profissional!');
        }
    }

    public function destroy(int $id)
    {
        $profissionais = Profissionais::findOrFail($id);

        if ($profissionais->delete()) {
            return redirect()->route('profissionais.index')->with('mensagem', 'Profissional excluído com sucesso!');
        } else {
            return redirect()->route('profissionais.index')->with('mensagem', 'Erro ao excluir o Profissional!');
        }
    }
}
