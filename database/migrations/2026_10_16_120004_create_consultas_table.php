<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('consultas')) {
            Schema::create('consultas', function (Blueprint $table) {
                $table->id();

                // Sem cascade de propósito: apagar um paciente, profissional,
                // secretária ou unidade com consultas deve ser BLOQUEADO pelo banco.
                $table->foreignId('paciente_id')->constrained('pacientes');
                $table->foreignId('profissional_id')->constrained('profissionais');
                $table->foreignId('secretaria_id')->constrained('secretarias');
                $table->foreignId('unidade_atendimento_id')->constrained('unidades_atendimento');

                $table->date('data_agendada');
                $table->time('hora_agendada');
                $table->string('codigo_agendamento', 100)->unique();
                $table->enum('situacao', ['AGENDADA', 'REALIZADA', 'CANCELADA', 'REMARCADA'])
                    ->default('AGENDADA');

                $table->timestamps();

                // Acelera a pergunta mais comum da agenda:
                // "quais horários desse profissional nesse dia?"
                $table->index(['profissional_id', 'data_agendada', 'hora_agendada']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
