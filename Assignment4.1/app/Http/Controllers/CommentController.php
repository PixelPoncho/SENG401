<?php

namespace App\Http\Controllers;

use Redirect;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\BookController;
use App\Book;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('editForms.addComment', [ //Parent view requires name and role to be passed
          'name' => Auth::user()->name,
          'user_id' => Auth::user()->id,
          'role' => Auth::user()->role,
          'book_id' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //This $request field is the $_POST data
    {
      $comment = new Comment();
      $comment -> text = $request->input('text');
      $comment -> user_id = $request->input('user_id');
      $comment -> book_id = $request->input('book_id');
      $comment->save();
      return Redirect::to('book_details/'.$comment -> book_id); //When this line thows an error, figure out what include this file is missing
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
     //Figure out how to pass the comment in
    public function edit(Comment $comment, $id)
    {
      $comment = Comment::findOrFail($id);
      return view('editForms.editComment', [  //Parent view requires name and role to be passed
        'name' => Auth::user()->name,
        'role' => Auth::user()->role,
        'comment_id' => $comment->id,
        'comment_text' => $comment->text
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment = Comment::findOrFail($request->input('comment_id'));
        $input = $request->all();
        $comment->fill($input)->save();

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
      $comment = Comment::find($id);
      $commBookID = $comment->book_id;
      $res=Comment::where('id',$id)->delete();

      $book = Book::find($commBookID);
        return view('book_details', [
          'res' => $book,
          'comments' => Comment::where('book_id', $commBookID)->get()
        ]);
    }
}
