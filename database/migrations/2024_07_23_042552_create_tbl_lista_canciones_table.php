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
        Schema::create('tbl_lista_canciones', function (Blueprint $table) {
            // $table->integer('lc_lst_id')->primary()->references('lst_id')->on('tbl_listas');
            // $table->integer('lc_can_posicion');
            // $table->integer('lc_can_id')->references('can_id')->on('tbl_canciones');
            // $table->string('lc_can_tono_actual', 10);
            // $table->timestamps();

            $table->unsignedInteger('lc_lst_id'); // Asegúrate de que sea unsigned
            $table->integer('lc_can_posicion');
            $table->unsignedInteger('lc_can_id'); // Asegúrate de que sea unsigned
            $table->string('lc_can_tono_actual', 10);
            $table->timestamps();

            $table->primary(['lc_lst_id', 'lc_can_id']); // Clave primaria compuesta
            $table->foreign('lc_lst_id')->references('lst_id')->on('tbl_listas')->onDelete('cascade');
            $table->foreign('lc_can_id')->references('can_id')->on('tbl_canciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_lista_canciones');
    }
};
