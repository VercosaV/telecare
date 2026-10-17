<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnidadeAtendimento extends Model
{
    protected $table = 'unidades_atendimento';
    protected $fillable = ['nome', 'endereco', 'possui_teleatendimento'];

    protected function casts(): array
    {
        return ['possui_teleatendimento' => 'boolean'];
    }
}
