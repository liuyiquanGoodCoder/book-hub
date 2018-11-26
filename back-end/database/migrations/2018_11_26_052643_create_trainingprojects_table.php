<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainingprojects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')
                ->unsigned();
            $table->integer('quantity');
            $table->string('details');
            $table->string('budget');
            $table->timestamp('startedat')->nullable();
            $table->timestamp('endedat')->nullable();
            
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainingprojects');
    }
}
