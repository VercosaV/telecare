<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('profissional_unidade')) {
            Schema::create('profissional_unidade', function (Blueprint $table) {
                // Tabela pivô N:M entre profissionais e unidades de atendimento.
                // O nome da tabela da FK é passado explicitamente porque
                // "profissional" não segue a pluralização em inglês do Laravel.
                $table->foreignId('profissional_id')
                    ->constrained('profissionais')
                    ->cascadeOnDelete();

                $table->foreignId('unidade_atendimento_id')
                    ->constrained('unidades_atendimento')
                    ->cascadeOnDelete();

                $table->timestamps();

                // Chave primária composta: impede vincular o mesmo par duas vezes.
                $table->primary(['profissional_id', 'unidade_atendimento_id']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('profissional_unidade');
    }
};
