<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      switch (Auth::user()->role) {
          case 'visitor':
              return $this->visitor();
              break;
          case 'subscriber':
              return $this->subscriber();
              break;
          case 'admin':
              return $this->admin();
              break;
          default:
                  return '/home';
              break;
      }
    }

//***********NEW STUFF************
    public function visitor()
    {
        return view('visitor', [
          'name' => Auth::user()->name,
          'role' => Auth::user()->role,
          'books' => \App\Book::all()
        ]);
    }

    public function subscriber()
    {
        return view('subscriber', [
          'name' => Auth::user()->name,
          'role' => Auth::user()->role,
          'books' => \App\Book::all()
        ]);
    }

    public function admin()
    {
        return view('admin', [
          'name' => Auth::user()->name,
          'role' => Auth::user()->role,
          'books' => \App\Book::all(),
          'users' => \App\User::all(),
          'subscriptions' => \App\Subscription::all(),
          'authors' => \App\Author::all()
        ]);
    }

//************END NEW STUFF**********
}
