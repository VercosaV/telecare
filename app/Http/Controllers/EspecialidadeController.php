<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidade;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $especialidades = Especialidade::all();
        return view('especialidades.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        if( Especialidade::create($request->all()))
            {
                return redirect()->route('especialidades.index')->with('mensagem', 'Especialidade inserida com sucesso!');
            } else {
                return redirect()->route('especialidades.index')->with('mensagem', 'Erro ao inserir a Especialidade!');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $especialidades = Especialidade::findOrFail($id);
        return view('especialidades.show', compact('especialidades'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $especialidades = Especialidade::findOrFail($id);
        return view('especialidades.edit', compact('especialidades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $especialidades = Especialidade::findOrFail($id);
        if($especialidades->update($request->all())){
            return redirect()->route('especialidades.index')->with('mensagem', 'Especialidade alterada com Sucesso!');
        } else {
            return redirect()->route('especialidades.index')->with('mensagem', 'Erro ao alterar a Especialidade!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $especialidades = Especialidade::findOrFail($id);
        if($especialidades->delete()) {
            return redirect()->route('especialidades.index')->with('mensagem', 'Especialidade excluída!');
        } else {
            return redirect()->route('especialidades.index')->with('mensagem', 'Erro ao excluir a Especialidade!');
        }
    }
}
