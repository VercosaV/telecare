<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    public function index()
    {
        $especialidades = Especialidade::all();
        return view('especialidades.index', compact('especialidades'));
    }

    public function create(Request $request)
    {
        // Pega a URL de onde o usuário veio (se existir)
        $redirectTo = $request->query('redirect_to', '/especialidades');
        
        return view('especialidades.create', compact('redirectTo'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'redirect_to' => 'nullable|url' // Validamos a URL de retorno
        ]);

        Especialidade::create(['nome' => $dados['nome']]);
        
        // Se veio de outra tela (como Profissionais), volta para lá. Se não, volta para a lista de especialidades.
        if (!empty($dados['redirect_to'])) {
            return redirect($dados['redirect_to'])->with('mensagem', 'Especialidade cadastrada! Agora você pode selecioná-la.');
        }

        return redirect()->route('especialidades.index')->with('mensagem', 'Especialidade cadastrada com sucesso!');
    }

    public function show(int $id)
    {
        $especialidades = Especialidade::findOrFail($id);
        return view('especialidades.show', compact('especialidades'));
    }

    public function edit(int $id)
    {
        $especialidades = Especialidade::findOrFail($id);
        return view('especialidades.edit', compact('especialidades'));
    }

    public function update(Request $request, int $id)
    {
        $especialidades = Especialidade::findOrFail($id);

        $dados = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $especialidades->update($dados);
        
        return redirect()->route('especialidades.index')->with('mensagem', 'Especialidade atualizada com sucesso!');
    }

    public function destroy(int $id)
    {
        $especialidades = Especialidade::findOrFail($id);
        if ($especialidades->delete()) {
            return redirect()->route('especialidades.index')->with('mensagem', 'Especialidade excluída!');
        } else {
            return redirect()->route('especialidades.index')->with('mensagem', 'Erro ao excluir a Especialidade!');
        }
    }
}