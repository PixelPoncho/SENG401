<?php

namespace App\Http\Controllers;

use Redirect;
use App\Subscription;
use App\Book;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
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
        return view('editForms.addSubscription', [
          'name' => Auth::user()->name,
          'role' => Auth::user()->role,
          'books' => \App\Book::all(),
          'users' => \App\User::all()
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
      //dd($request->input('start'));
      $sub = new Subscription();
      $sub -> start = $request->input('start');
      $sub -> end = $request->input('end');
      $sub -> user_id = $request->input('user_id');
      $sub -> book_id = $request->input('book_id');
      $sub->save();
      return Redirect::to('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription, $id)
    {
      $sub = Subscription::findOrFail($id);
      return view('editForms.editSubscription', [  //Parent view requires name and role to be passed
        'name' => Auth::user()->name,
        'role' => Auth::user()->role,
        'book_title' => Book::findOrFail($sub->book_id)->title,
        'user_name' => User::findOrFail($sub->user_id)->name,
        'start' => $sub->start,
        'end' => $sub->end,
        'sub_id' => $id
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
      $subscription = Subscription::findOrFail($request->input('id'));
      $input = $request->all();
      $subscription->fill($input)->save();

      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
