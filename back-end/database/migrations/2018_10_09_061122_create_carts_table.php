<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')
                ->unsigned()
                ->nullable();
            $table->integer('bid')
                ->unsigned()
                ->nullable();
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('uid')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('bid')
                ->references('id')
                ->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
