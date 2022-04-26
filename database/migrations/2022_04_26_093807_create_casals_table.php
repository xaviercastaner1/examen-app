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
        Schema::create('casals', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->date('data_inici');
            $table->date('data_final');
            $table->unsignedBigInteger('n_places');
            
            $table->unsignedBigInteger('ciutat');
            $table->foreign('ciutat')
                ->references('id')
                ->on('ciutats')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('casals');
    }
};
