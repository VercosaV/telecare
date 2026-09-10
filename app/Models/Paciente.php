<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';

    public $incrementing = true;

    protected $fillable = [
        'nome', 'cpf', 'telefone', 'email'
        
    ];
}
