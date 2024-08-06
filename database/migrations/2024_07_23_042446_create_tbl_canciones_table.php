<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // $table->tipo_de_dato('nombre_campo');            Por defecto, es not null
    // $table->tipo_de_dato('nombre_campo')->primary(); Definir como llave primaria
    // $table->increments('nombre_campo');              Definir como llave primaria autoincrementable
    // $table->tipo_de_dato('nombre_campo')->references('id')->on('tabla_relacionada');

    public function up(): void
    {
        Schema::create('tbl_canciones', function (Blueprint $table) {
            $table->increments('can_id');
            $table->string('can_nombre', 100);
            $table->string('can_banda_cantante', 100);
            $table->string('can_tonalidad', 10);
            $table->text('can_letra');
            $table->text('can_cifrado');
            $table->string('can_id_video', 100)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_canciones');
    }
};
