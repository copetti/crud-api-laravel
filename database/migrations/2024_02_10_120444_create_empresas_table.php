<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigInteger('recnum')->unique();
            $table->decimal('codigo',4,0)->index();
            $table->decimal('empresa',4,0);
            $table->string('sigla', 40);
            $table->string('razao_social', 255);
            $table->timestamps();
            $table->primary(['recnum', 'codigo']);
        });

        \DB::statement('ALTER TABLE empresas MODIFY recnum BIGINT NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
