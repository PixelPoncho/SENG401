<?php

namespace App\Http\Controllers;

use App\Book;
use App\Comment;
use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $res = Book::find($id);
        return view('book_details', [
          'res' => $res,
          'comments' => Comment::where('book_id', $id)->get()
        ]);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $book = new Book();
      $book -> title = $request->input('title');
      $book -> isbn = $request->input('isbn');
      $book -> publisher = $request->input('publisher');
      $book -> publicationYear = $request->input('year');
      $book -> author_id = $request->input('author');
      $book -> localLinkToImage = $request->input('localLinkToImage');
      $book->save();
      return Redirect::to('book_details/'.$book -> id); //When this line thows an error, figure out what include this file is missing
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
     //WHERE DOES THIS GET CALLED FROM?
    public function show($id)
    {
      $res = Book::find($id);
        return view('book_details', [
          'res' => $res,
          'comments' => Comment::where('book_id', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
     //NEVER GETS CALLED
    public function edit(Book $book)
    {
        //public function edit( Post $post )
        return view('book_details.edit', compact('book'))->with('res', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book, $id)
    {
        Book::where('id', $id)->update($request->except(['_token', '_method']));
        return redirect('book_details')->with('res', $book);    //BROKEN
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }

    /**
    * @return \Illuminate\Contracts\Support\Renderable
    * @return \Illuminate\Http\Response
    */
    public function bookDetails($id)
    {
      $res = Book::find($id);
      return view('book_details')->with('res', $res);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateManual(Request $request)
    {
      $book = Book::find($request->id);;
      $book->title = $request->input('title');
      $book->isbn = $request->input('isbn');
      $book->author_id = $request->input('author_id');
      $book->publicationYear = $request->input('publicationYear');
      $book->publisher = $request->input('publisher');
      $book->localLinkToImage = $request->input('localLinkToImage');

     $book->save();
     return view('book_details')->with('res', $book);
    }

}
