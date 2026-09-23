<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profissionais extends Model
{
    protected $table = "profissionais";
    public $incrementing = true ; 
    protected $fillable = 
    [
         'tipo_profissional', 'nome', 'crm', 'telefone', 'email', 'especialidade_id', 'cpf'
    ];
    
    public function especialidade()
    {
        return $this -> belongsTo(Especialidade::class, 'especialidade_id');
    }

}
