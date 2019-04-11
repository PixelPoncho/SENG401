<?php

namespace App\Http\Controllers;

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
      $all_accounts = \App\Account::all();
      $accounts = $all_accounts->where('user_id', Auth::user()->role);
        return view('home', [
          'accounts' => \App\Account::all(),
          'transactions' => Transaction::where('account_id', $id)->get()
        ]);
    }
}
