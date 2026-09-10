<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Prontuario extends Model
{
   protected $table = 'prontuarios';

    public $incrementing = true;

    protected $fillable = [
        'paciente_id', 'data_registro',
        'diagnostico'
    ];

    protected $casts = [
        'data_registro' => 'datetime',

    ];

    public function paciente() {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}
