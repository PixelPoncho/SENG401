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
          $table->bigIncrements('id');
          $table->string('isbn');
          $table->string('title');
          $table->unsignedInteger('author_id'); //NOTE: This will need support for multiple authors
          $table->year('publicationYear');
          $table->string('publisher');
          //$table->boolean('subStatus')->default(false);  //1 is signed out
          $table->string('localLinkToImage');
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
        Schema::dropIfExists('books');
    }
}
