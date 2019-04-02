<?php

use App\Book;
use App\Rating;

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    //
    factory(Book::class, 50)->create()->each(function($b)
    {
      $b->ratings()->save(factory(Rating::class)->make());
    });
  }
}
