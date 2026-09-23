<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('profissionais')) {
            Schema::create('profissionais', function (Blueprint $table) {
                $table->id();
                $table->string('tipo_profissional');
                $table->string('nome');
                $table->string('crm')->nullable()->unique();
                $table->string('cpf')->unique();
                $table->string('telefone')->nullable();
                $table->string('email')->unique();
                $table->foreignId('especialidade_id')
                    ->nullable()
                    ->constrained('especialidades') 
                    ->onDelete('cascade');

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profissionais');
    }
};
