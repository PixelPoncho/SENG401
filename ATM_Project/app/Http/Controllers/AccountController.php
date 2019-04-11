<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $account = \App\Account::findOrFail($id);
      return view('account_details', [
        'account' => $account,
        'transactions' => \App\Transaction::all()->where('account_id', $account->id)
      ]);
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
     //NATHAN COPIED AND PASTED THIS FROM THE LAST ASSIGNMENT
    public function store(Request $request)
    {
      $account = new Account();
      $account -> type = $request->input('type');
      $account -> user_id = $request->input('user_id');
      $account -> balance = 0;
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
