<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pacientes', function (Blueprint $table) {
            // Aumenta o limite do nome e permite nulos nos campos únicos caso seja salvo como rascunho
            $table->string('nome', 255)->change();
            $table->string('cpf', 11)->nullable()->change();
            $table->string('telefone', 20)->nullable()->change();
            $table->string('email')->nullable()->change();

            // Novos campos: Dados do Paciente
            $table->string('foto')->nullable()->after('id');
            $table->string('sexo', 20)->nullable()->after('nome');
            $table->date('data_nascimento')->nullable()->after('sexo');
            $table->string('rg', 30)->nullable()->after('data_nascimento');
            $table->string('profissao', 100)->nullable()->after('email');
            $table->string('cartao_sus', 30)->nullable()->after('profissao');

            // Novos campos: Endereço
            $table->string('cep', 9)->nullable()->after('cartao_sus');
            $table->string('cidade', 100)->nullable()->after('cep');
            $table->string('estado', 2)->nullable()->after('cidade');
            $table->string('logradouro', 255)->nullable()->after('estado');
            $table->string('bairro', 100)->nullable()->after('logradouro');
            $table->string('numero', 20)->nullable()->after('bairro');
            $table->string('complemento', 100)->nullable()->after('numero');

            // Controle de rascunho
            $table->boolean('rascunho')->default(false)->after('complemento');
        });
    }

    public function down(): void
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->dropColumn([
                'foto', 'sexo', 'data_nascimento', 'rg', 'profissao', 'cartao_sus',
                'cep', 'cidade', 'estado', 'logradouro', 'bairro', 'numero',
                'complemento', 'rascunho',
            ]);
        });
    }
};