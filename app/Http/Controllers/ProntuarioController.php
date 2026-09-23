<?php

namespace App\Http\Controllers;

use App\Models\Prontuario;
use App\Models\Paciente;
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
        if( Prontuario::create($request->all()))
            {
                return redirect()->route('prontuarios.index')->with('mensagem', 'Prontuario inserida com sucesso!');
            } else {
                return redirect()->route('prontuarios.index')->with('mensagem', 'Erro ao inserir o Prontuario!');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $pacientes = Paciente::findOrFail($id);
        $prontuarios = Prontuario::findOrFail($id);
        return view('prontuarios.show', compact('prontuarios', 'pacientes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $pacientes = Paciente::all();
        $prontuarios = Prontuario::findOrFail($id);
        return view('prontuarios.edit', compact('prontuarios', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $prontuarios = Prontuario::findOrFail($id);
        if($prontuarios->update($request->all())){
            return redirect()->route('prontuarios.index')->with('mensagem', 'Prontuario alterado com Sucesso!');
        } else {
            return redirect()->route('prontuarios.index')->with('mensagem', 'Erro ao alterar o Prontuario!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $prontuarios = Prontuario::findOrFail($id);
        if($prontuarios->delete()) {
            return redirect()->route('prontuarios.index')->with('mensagem', 'Prontuario excluído!');
        } else {
            return redirect()->route('prontuarios.index')->with('mensagem', 'Erro ao excluir o Prontuario!');
        }
    }
}
