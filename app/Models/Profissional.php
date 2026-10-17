<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profissional extends Model
{
    protected $table = 'profissionais';

    public function especialidade(): BelongsTo
    {
        return $this->belongsTo(Especialidade::class);
    }

    // N:M com a tabela pivô profissional_unidade
    public function unidades(): BelongsToMany
    {
        return $this->belongsToMany(
            UnidadeAtendimento::class,
            'profissional_unidade',
            'profissional_id',
            'unidade_atendimento_id'
        )->withTimestamps();
    }

    public function consultas(): HasMany
    {
        return $this->hasMany(Consulta::class);
    }
    

    /*
    protected $table = "profissionais";
    public $incrementing = true ; 
    protected $fillable = 
    [
         'tipo_profissional', 'nome', 'crm', 'telefone', 'email', 'especialidade_id', 'cpf'
    ];
    
    public function especialidade()
    {
        return $this -> belongsTo(Especialidade::class, 'especialidade_id');
    }*/

}
