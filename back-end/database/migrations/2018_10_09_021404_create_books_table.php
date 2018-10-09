<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('uid')
                ->unsigned()
                ->nullable();
            $table->integer('role')
                ->default(0)
                ->comment('newbook,0;oldbook,1');
            $table->string('ISBN');
            $table->string('bname');
            $table->string('author');
            $table->integer('pub-year');
            $table->string('publisher');
            $table->string('img-s');
            $table->string('img-m');
            $table->string('img-l');
            $table->integer('quantity');
            $table->string('price');
            $table->timestamps();

            $table->foreign('uid')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('role')
                ->default(0)
                ->comment('buyer,0;seller,1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}

