<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\User;
use App\Transaction;

class TransactionController extends Controller
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
  * @param  \App\Transaction  $transaction
  * @return \Illuminate\Http\Response
  */
  public function show(Transaction $transaction)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Transaction  $transaction
  * @return \Illuminate\Http\Response
  */
  public function edit(Transaction $transaction)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Transaction  $transaction
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Transaction $transaction)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Transaction  $transaction
  * @return \Illuminate\Http\Response
  */
  public function destroy(Transaction $transaction)
  {
    //
  }
  ///////////////////////////////////////////////////
  //new funcs below
  //////////////////////////////////////////////////
  public function withdraw(Request $request, $id)
  {
    $account = Account::find($id);
    $user = User::find($account->userID);
    $withdraw = $request ->input('withdraw');
    $ldate = date('Y-m-d H:i:s');
    $balance = $account -> balance;
    if($balance-$withdraw <0){
      echo $balance;
      echo " old \n ";
      echo $withdraw;
      echo " change \n ";
      echo $balance-$withdraw;
      echo " new\n ";
      echo "NOT enough funds";
    }else{
      $account -> balance = $account -> balance -$withdraw;
      $account->save();

      $transaction = new Transaction();
      $transaction -> account_id = $account -> id;
      $transaction -> user_id = $user -> id;
      $transaction -> old_balance = $balance;
      $transaction -> change = $withdraw;
      $transaction -> new_balance = $account -> balance;
      $transaction -> date = $ldate;
      $transaction -> valid = true;
      $transaction ->save();
      echo $balance;
      echo " old \n ";
      echo $withdraw;
      echo " change \n ";
      echo $balance-$withdraw;
      echo " new\n ";
      echo "yes enough funds";
    }

  }

  public function deposit(Request $request, $id)
  {
    $account = Account::find($id);
    $deposit = $request -> input('deposit');
    $ldate = date('Y-m-d H:i:s');


    return view('home');

  }
  public function transfer(Request $request, $id)
  {
    $account = Account::find($id);
    $transferAmount = $request ->input('transferAmount');
    $transferRecipient = $request ->input('transferRecipient');
    $ldate = date('Y-m-d H:i:s');


    return view('home');

  }


}
