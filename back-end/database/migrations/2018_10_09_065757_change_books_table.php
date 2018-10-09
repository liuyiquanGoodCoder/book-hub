<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->integer('uid')
                ->unsigned()
                ->nullable(false)
                ->change();
        });
        Schema::table('carts', function (Blueprint $table) {
            $table->integer('uid')
                ->unsigned()
                ->nullable(false)
                ->change();
            $table->integer('bid')
                ->unsigned()
                ->nullable(false)
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
        //
    }
}
