<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Resources\AuthorResource;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return AuthorResource::collection(Author::with('books')->paginate(25));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $author = Author::create([
      'name' => $request->name
    ]);

    return new AuthorResource($author);
  }


  /**
  * Display the specified resource.
  *
  * @param  Author $author
  * @return \Illuminate\Http\Response
  */
  public function show(Author $author)
  {
    return new AuthorResource($author);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  Author $author
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Author $author)
  {

    $author->update($request->only(['name']));

    return new AuthorResource($author);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  Author $author
  * @return \Illuminate\Http\Response
  */
  public function destroy(Author $author)
  {
    $author->delete();

    return response()->json(null, 204);
  }

  public function __construct()
  {
    $this->middleware('auth:api')->except(['index', 'show']);
  }
}
