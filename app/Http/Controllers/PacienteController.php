<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();

        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|digits:11|unique:pacientes,cpf',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:pacientes,email',
        ]);

        Paciente::create($dados);

        return redirect()->route('pacientes.index')->with('mensagem', 'Paciente criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $pacientes = Paciente::findOrFail($id);

        return view('pacientes.show', compact('pacientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $pacientes = Paciente::findOrFail($id);

        return view('pacientes.edit', compact('pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $paciente = Paciente::findOrFail($id);

        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => ['required', 'digits:11', Rule::unique('pacientes', 'cpf')->ignore($paciente->id)],
            'telefone' => 'required|string|max:20',
            'email' => ['required', 'email', 'max:255', Rule::unique('pacientes', 'email')->ignore($paciente->id)],
        ]);

        $paciente->update($dados);

        return redirect()->route('pacientes.index')->with('mensagem', 'Paciente alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $pacientes = Paciente::findOrFail($id);
        if ($pacientes->delete()) {
            return redirect()->route('pacientes.index')->with('mensagem', 'Paciente excluído!');
        } else {
            return redirect()->route('pacientes.index')->with('mensagem', 'Erro ao excluir o Paciente!');
        }
    }
}
