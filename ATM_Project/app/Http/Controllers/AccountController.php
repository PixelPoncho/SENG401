<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Account;
use App\User;
use App\Transaction;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

      $account = Account::find($id);
      //$test = Account::where('userID', Auth::user()->id)->get();

      //dd($test);
      //$transactions = Transaction::find($id);
      return view('account_details', [
        'account' => $account,
        'transactions' => Transaction::where('account_id', $id)->get(),
        'otherAccounts' => Account::where('userID', Auth::user()->id)->get()
      ]);
      //All the data from the account and transactions need passed to the view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $account = new \App\Account();
      $account -> type = $request->input('type');
      $account -> userID = Auth::user()->id;
      $account -> balance = 0;
      $account -> open_date =  date("Y-m-d");
      $account->save();
      return Redirect::to('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Show account details, plus each transaction associated with the account
        $account = Account::find($id);
          return view('account_details', [
            'account' => $account,
            'transactions' => Transaction::where('account_id', $id)->get()
          ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     //NATHAN COPIED AND PASTED THIS FROM THE LAST ASSIGNMENT
    public function edit(Account $account)
    {
      return view('account_details.edit', compact('account'))->with('res', $account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      //NATHAN COPIED AND PASTED THIS FROM THE LAST ASSIGNMENT
    public function update(Request $request, $id)
    {
      Account::where('id', $id)->update($request->except(['_token', '_method']));
      return redirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Ensure account has $0, then...
        $res=Account::where('id',$id)->delete();
        return view('home');
    }
}
