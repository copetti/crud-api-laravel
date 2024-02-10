<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigInteger('recnum')->unique();
            $table->decimal('empresa', 4, 0);
            $table->foreign('empresa')
                ->references('codigo')
                ->on('empresas');
            $table->unsignedDecimal('codigo', 14, 0);
            $table->string('razao_social', 255);
            $table->enum('tipo', ['PJ', 'PF']);
            $table->string('cpf_cnpj', 14);
            $table->primary(['recnum', 'codigo']);
            $table->timestamps();
        });

        \DB::statement('ALTER TABLE clientes MODIFY recnum BIGINT NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
