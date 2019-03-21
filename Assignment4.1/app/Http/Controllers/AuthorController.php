<?php

namespace App\Http\Controllers;

use Redirect;
use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
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
    public function create()
    {
      return view('editForms.addAuthor', [ //Parent view requires name and role to be passed
        'name' => Auth::user()->name,
        'role' => Auth::user()->role
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
      $author = new Author();
      $author -> name = $request->input('name');
      $author->save();
      return Redirect::to('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author, $id)
    {
      $author = Author::findOrFail($id);
      return view('editForms.editAuthor', [  //Parent view requires name and role to be passed
        'name' => Auth::user()->name,
        'role' => Auth::user()->role,
        'auth_name' => $author->name,
        'auth_id' => $id
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
      //dd($request);
      $author = Author::findOrFail($request->input('auth_id'));
      $input = $request->all();
      $author->fill($input)->save();

      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author, $id)
    {
      //REBECCA PLEASE HELP!
    }
}
