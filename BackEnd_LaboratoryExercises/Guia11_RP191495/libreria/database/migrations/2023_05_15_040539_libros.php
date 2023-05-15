<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        schema::create('libros', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('autor')->nullable();
            $table->string('genero')->nullable();
            $table->integer('volumen');
            $table->decimal('precio', 5, 2)->nullable()->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
