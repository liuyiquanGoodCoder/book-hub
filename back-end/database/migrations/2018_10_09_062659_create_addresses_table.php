<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')
                ->unsigned();
            $table->integer('role')
                ->default(0)
                ->comment('normal add,0;default add,1');
            $table->string('receiver');
            $table->integer('countrycode')
                ->default(0)
                ->comment('othercountry,0');
            $table->string('othercountry')
                ->nullable();
            $table->string('addline1');
            $table->string('addline2');
            $table->integer('regioncode')
                ->default(0)
                ->comment('otherregion,0');
            $table->string('otherregion')
                ->nullable();
            $table->integer('citycode')
                ->default(0)
                ->comment('othercity,0');
            $table->string('othercity')
                ->nullable();
            $table->string('postalcode')
                ->nullable();
            $table->string('phonenum');
            $table->timestamps();

            $table->foreign('uid')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::table('books', function (Blueprint $table) {
            $table->integer('uid')
                ->unsigned()
                ->change();
        });
        Schema::table('carts', function (Blueprint $table) {
            $table->integer('uid')
                ->unsigned()
                ->change();
            $table->integer('bid')
                ->unsigned()
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
