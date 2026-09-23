<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    protected $table = 'especialidades';

    public $incrementing = true;
    
    protected $fillable = ['nome']; 
}