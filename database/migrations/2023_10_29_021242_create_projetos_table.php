<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->string('titulo');
            $table->text('descricao');
            $table->unsignedBigInteger('prazo');
            $table->decimal('orcamento', 10, 2);
            $table->unsignedBigInteger('qtdPrestadores');
            // $table->string('categoria');
            // $table->date('data_criacao');
            $table->date('data_atual')->default(DB::raw('CURRENT_DATE'));
            // $table->string('status');
            // $table->text('habilidades_necessarias');
            // $table->integer('numero_membros_equipe_desejado');
            // $table->json('cargos_equipe_desejados'); // Pode armazenar cargos como JSON
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projetos');
    }
};
