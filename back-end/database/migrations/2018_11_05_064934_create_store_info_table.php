<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')
                ->unsigned();
            $table->string('sname');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->string('details');
            $table->integer('status');
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
        Schema::dropIfExists('store_info');
    }
}
