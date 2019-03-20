<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book_details');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $res = Book::find($id);
        return view('book_details')->with('res', $res);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
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
    public function update(Request $request, Book $book)
    {
        //
        Book::where('id', $book)->update($request->except(['_token', '_method']));
        return redirect('book_details')->with('res', $book);
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
      // $res=Book::where('id',$id);
      //$res=Book::all();
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
