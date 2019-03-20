<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_authors', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->bigInteger('book_id')->unsigned();
            $table->bigInteger('author_id')->unsigned();
        //    $table->timestamp('timestamp');
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('author_id')->references('id')->on('author');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_authors');
    }
}
