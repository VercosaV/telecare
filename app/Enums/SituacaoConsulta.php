<?php

namespace App\Enums;
// app/Enums/SituacaoConsulta.php

enum SituacaoConsulta: string
{
    case Agendada  = 'AGENDADA';
    case Realizada = 'REALIZADA';
    case Cancelada = 'CANCELADA';
    case Remarcada = 'REMARCADA';
}