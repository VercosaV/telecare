<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $isRascunho = $request->input('action') === 'rascunho';

        $dados = $this->validarPaciente($request, null, $isRascunho);
        $dados['rascunho'] = $isRascunho;

        if ($request->hasFile('foto')) {
            $dados['foto'] = $request->file('foto')->store('pacientes', 'public');
        }

        Paciente::create($dados);

        $mensagem = $isRascunho
            ? 'Rascunho do paciente salvo com sucesso!'
            : 'Paciente criado com sucesso!';

        return redirect()->route('pacientes.index')->with('mensagem', $mensagem);
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
        $isRascunho = $request->input('action') === 'rascunho';

        $dados = $this->validarPaciente($request, $paciente->id, $isRascunho);
        $dados['rascunho'] = $isRascunho;

        if ($request->hasFile('foto')) {
            if ($paciente->foto) {
                Storage::disk('public')->delete($paciente->foto);
            }
            $dados['foto'] = $request->file('foto')->store('pacientes', 'public');
        }

        $paciente->update($dados);

        $mensagem = $isRascunho
            ? 'Rascunho atualizado com sucesso!'
            : 'Paciente alterado com sucesso!';

        return redirect()->route('pacientes.index')->with('mensagem', $mensagem);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $paciente = Paciente::findOrFail($id);
        $fotoAntiga = $paciente->foto;

        if ($paciente->delete()) {
            if ($fotoAntiga) {
                Storage::disk('public')->delete($fotoAntiga);
            }

            return redirect()->route('pacientes.index')->with('mensagem', 'Paciente excluído!');
        }

        return redirect()->route('pacientes.index')->with('mensagem', 'Erro ao excluir o Paciente!');
    }

    /**
     * Centraliza as regras de validação para store e update.
     */
    private function validarPaciente(Request $request, ?int $pacienteId = null, bool $isRascunho = false): array
    {
        $obrigatorio = $isRascunho ? 'nullable' : 'required';

        return $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'nome' => 'required|string|max:255',
            'sexo' => 'nullable|string|max:20',
            'data_nascimento' => 'nullable|date',
            'rg' => 'nullable|string|max:30',
            'cpf' => [
                $obrigatorio,
                'digits:11',
                Rule::unique('pacientes', 'cpf')->ignore($pacienteId),
            ],
            'telefone' => [$obrigatorio, 'string', 'max:20'],
            'email' => [
                $obrigatorio,
                'email',
                'max:255',
                Rule::unique('pacientes', 'email')->ignore($pacienteId),
            ],
            'profissao' => 'nullable|string|max:100',
            'cartao_sus' => 'nullable|string|max:30',
            'cep' => 'nullable|string|max:9',
            'cidade' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:2',
            'logradouro' => 'nullable|string|max:255',
            'bairro' => 'nullable|string|max:100',
            'numero' => 'nullable|string|max:20',
            'complemento' => 'nullable|string|max:100',
        ]);
    }
}