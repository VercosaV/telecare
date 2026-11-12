<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';

    public $incrementing = true;

    protected $fillable = [
        'foto',
        'nome',
        'sexo',
        'data_nascimento',
        'rg',
        'cpf',
        'telefone',
        'email',
        'profissao',
        'cartao_sus',
        'cep',
        'cidade',
        'estado',
        'logradouro',
        'bairro',
        'numero',
        'complemento',
        'rascunho',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
        'rascunho' => 'boolean',
    ];
}