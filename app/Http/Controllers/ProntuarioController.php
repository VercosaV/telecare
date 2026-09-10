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
        $prontuario = Prontuario::with('paciente')->get();
        return view('prontuarios.index', compact('prontuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prontuario = Prontuario::all();
        return view('prontuarios.create', compact('prontuario'));
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
        $prontuario = Prontuario::findOrFail($id);
        return view('prontuarios.show', compact('prontuario'));
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
    public function update(Request $request, Prontuario $prontuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prontuario $prontuario)
    {
        //
    }
}
