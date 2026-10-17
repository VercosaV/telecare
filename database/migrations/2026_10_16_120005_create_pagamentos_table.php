<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('pagamentos')) {
            Schema::create('pagamentos', function (Blueprint $table) {
                $table->id();

                // unique() ANTES de constrained(): é o que garante a relação 1:1
                // (no máximo um pagamento por consulta).
                $table->foreignId('consulta_id')
                    ->unique()
                    ->constrained('consultas')
                    ->cascadeOnDelete();

                $table->dateTime('data_pagamento')->nullable();
                $table->decimal('valor', 10, 2);
                $table->enum('metodo', ['PIX', 'CARTAO_CREDITO', 'CARTAO_DEBITO', 'DINHEIRO', 'CONVENIO']);
                $table->enum('situacao', ['PENDENTE', 'PAGO', 'CANCELADO', 'ESTORNADO'])
                    ->default('PENDENTE');

                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('pagamentos');
    }
};
