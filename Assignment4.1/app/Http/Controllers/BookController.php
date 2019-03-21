<?php

namespace App\Http\Controllers;

use Redirect;
use App\Book;
use App\Comment;
use Illuminate\Http\Request;

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
    public function create($id)
    {
        //
        return view('editForms.addBook', [ //Parent view requires name and role to be passed
          'book_id' => $id
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
        //
        $book = new Book();
        $book->title = $request->input('title');
        $book->isbn = $request->input('isbn');
        $book->author_id = $request->input('author_id');
        $book->publicationYear = $request->input('publicationYear');
        $book->publisher = $request->input('publisher');
        $book->localLinkToImage = $request->input('localLinkToImage');
        $book->save();
        return Redirect::to('book_details/'.$book -> book_id); //When this line thows an error, figure out what include this file is missing
      }
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
    public function edit(Book $book, $id)
    {
        //public function edit( Post $post )
        $book = Book::findOrFail($id);
        return view('editForms.editComment', [  //Parent view requires name and role to be passed
          'title' => $book->title,
          'isbn' => $book->isbn,
          'author_id' => $book->author_id,
          'publicationYear' => $book->publicationYear
          'publisher' => $book->publisher
          'localLinkToImage' => $book->localLinkToImage
          // $book->title = $request->input('title');
          // $book->isbn = $request->input('isbn');
          // $book->author_id = $request->input('author_id');
          // $book->publicationYear = $request->input('publicationYear');
          // $book->publisher = $request->input('publisher');
          // $book->localLinkToImage = $request->input('localLinkToImage');
        ]);
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
      return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateManual(Request $request)
    {
      $book = Book::findOrFail($request->input('id'));
      $input = $request->all();
      // $book->title = $request->input('title');
      // $book->isbn = $request->input('isbn');
      // $book->author_id = $request->input('author_id');
      // $book->publicationYear = $request->input('publicationYear');
      // $book->publisher = $request->input('publisher');
      // $book->localLinkToImage = $request->input('localLinkToImage');
      $book->fill($input)->save();
      echo $book->id;
      echo "hello";
     // $book->save();
     //return redirect()->back();
     return redirect('book_details')->with('res', $book);
    }

}
