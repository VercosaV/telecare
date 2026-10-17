<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Requests\StorePacienteRequest;

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

    /*
    public function store(Request $request)
    {
        if( Paciente::create($request->all()))
            {
                return redirect()->route('pacientes.index')->with('mensagem', 'paciente criado com sucesso!');
            } else {
                return redirect()->route('pacientes.index')->with('mensagem', 'Erro ao inserir o paciente!');
            }
    } */

    public function store(StorePacienteRequest $request)
    {
        Paciente::create($request->all());

        return redirect()->route('pacientes.index');
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
        $pacientes = Paciente::findOrFail($id);
        if ($pacientes->update($request->all())) {
            return redirect()->route('pacientes.index')->with('mensagem', 'Paciente alterado com Sucesso!');
        } else {
            return redirect()->route('pacientes.index')->with('mensagem', 'Erro ao alterar o Paciente!');
        }
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
