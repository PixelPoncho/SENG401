<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Resources\BookResource;

use Illuminate\Http\Request;

class imageController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return BookResource::collection(Book::with('ratings')->paginate(25));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $book = Book::create([
      'name' => $request->name
    ]);

    return new BookResource($book);
  }


  /**
  * Display the specified resource.
  *
  * @param  Book $book
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $theBook = Book::where('id', $id)->get();
    $data = '<img src="';
    //$book = new BookResource($book);
    //return $theBook;
    $imageURLArray = json_decode($theBook);
    //dd($imageURLArray);
    $url=$imageURLArray[0]->image;
    $data .= $url;
    $data .= '">';
    return $data;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $authors = Author::all();
    return view('editForms.addBook', [ //Parent view requires name and role to be passed
      'role' => Auth::user()->role,
      'name' => Auth::user()->name,
      'authors' => $authors
      //'user_id' => Auth::user()->id,
    ]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  Book $book
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Book $book)
  {

    $book->update($request->only(['name']));

    return new BookResource($book);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  Book $book
  * @return \Illuminate\Http\Response
  */
  public function destroy(Book $book)
  {
    $book->delete();

    return response()->json(null, 204);
  }

  public function __construct()
  {
    $this->middleware('auth:api')->except(['index', 'show']);
  }
}
