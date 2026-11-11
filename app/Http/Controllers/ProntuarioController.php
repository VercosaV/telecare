<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Prontuario;
use Illuminate\Http\Request;

class ProntuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prontuarios = Prontuario::with('paciente')->get();

        return view('prontuarios.index', compact('prontuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::all();

        return view('prontuarios.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ProntuarioController, store e update usam as mesmas regras
        $dados = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_registro' => 'required|date',
            'diagnostico' => 'required|string',
        ]);

        Prontuario::create($dados);      // no store

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $prontuarios = Prontuario::findOrFail($id);
        $pacientes = $prontuarios->paciente;

        return view('prontuarios.show', compact('prontuarios', 'pacientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $prontuarios = Prontuario::findOrFail($id);
        $pacientes = $prontuarios->paciente;

        return view('prontuarios.edit', compact('prontuarios', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $prontuarios = Prontuario::findOrFail($id);
        // ProntuarioController, store e update usam as mesmas regras
        $dados = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'data_registro' => 'required|date',
            'diagnostico' => 'required|string',
        ]);

        $prontuarios->update($dados);    // no update
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $prontuarios = Prontuario::findOrFail($id);
        if ($prontuarios->delete()) {
            return redirect()->route('prontuarios.index')->with('mensagem', 'Prontuario excluído!');
        } else {
            return redirect()->route('prontuarios.index')->with('mensagem', 'Erro ao excluir o Prontuario!');
        }
    }
}
