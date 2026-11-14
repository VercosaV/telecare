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
        $dados = $request->validate([
            'tipo_profissional' => 'required|in:medico,secretaria',
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|size:14|unique:profissionais,cpf',
            'telefone' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:profissionais,email',
            'crm' => 'required_if:tipo_profissional,medico|nullable|string|max:20|unique:profissionais,crm',
            'especialidade_id' => 'required_if:tipo_profissional,medico|nullable|exists:especialidades,id',
        ]);

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
        
        $dados = $request->validate([
            'tipo_profissional' => 'required|in:medico,secretaria',
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|size:14|unique:profissionais,cpf,'.$id,
            'telefone' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:profissionais,email,'.$id,
            'crm' => 'required_if:tipo_profissional,medico|nullable|string|max:20|unique:profissionais,crm,'.$id,
            'especialidade_id' => 'required_if:tipo_profissional,medico|nullable|exists:especialidades,id',
        ]);

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