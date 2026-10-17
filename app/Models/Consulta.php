<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use app\Enums\SituacaoConsulta;

class Consulta extends Model
{
    protected $fillable = [
        'paciente_id', 'profissional_id', 'secretaria_id', 'unidade_atendimento_id',
        'data_agendada', 'hora_agendada', 'codigo_agendamento', 'situacao',
    ];

    protected function casts(): array
    {
        return [
            'data_agendada' => 'date',
            'situacao' => SituacaoConsulta::class, // enum do PHP, abaixo
        ];
    }

    public function paciente(): BelongsTo { return $this->belongsTo(Paciente::class); }
    public function profissional(): BelongsTo { return $this->belongsTo(Profissional::class); }
    public function secretaria(): BelongsTo { return $this->belongsTo(Secretaria::class); }
    public function unidade(): BelongsTo { return $this->belongsTo(UnidadeAtendimento::class, 'unidade_atendimento_id'); }
    public function pagamento(): HasOne { return $this->hasOne(Pagamento::class); }
}
