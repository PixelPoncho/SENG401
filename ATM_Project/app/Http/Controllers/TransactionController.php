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
  ///////////////////////////////////////////////////////////////////
  //new funcs below
  //////////////////////////////////////////////////////////////////
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
      $transaction -> change = 0 -$withdraw;
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
    $user = User::find($account->userID);
    $deposit = $request ->input('deposit');
    $ldate = date('Y-m-d H:i:s');
    $balance = $account -> balance;
    $account -> balance = $account -> balance + $deposit;
    $account->save();

    $transaction = new Transaction();
    $transaction -> account_id = $account -> id;
    $transaction -> user_id = $user -> id;
    $transaction -> old_balance = $balance;
    $transaction -> change = $deposit;
    $transaction -> new_balance = $account -> balance;
    $transaction -> date = $ldate;
    $transaction -> valid = true;
    $transaction ->save();
    echo $balance;
    echo " old \n ";
    echo $deposit;
    echo " change \n ";
    echo $balance+$deposit;
    echo " new\n ";
    echo "added funds";

  }
  public function transfer(Request $request, $id)
  {
    $account1 = Account::find($id);
    $user1 = User::find($account1->userID);

    $transferAmount = $request ->input('transferAmount');

    $id2 = $request ->input('transferRecipient');
    $account2 = Account::find($id2);
    $user2 = User::find($account2->userID);

    $ldate = date('Y-m-d H:i:s');

    $balance1 = $account1 -> balance;
    // $balance2 = $account2 -> balance;

    if($balance1-$transferAmount <0){
      echo "NOT enough funds";
    }else{
      $account1 -> balance = $account1 -> balance -$transferAmount;
      $account1->save();

      $transaction = new Transaction();
      $transaction -> account_id = $account1 -> id;
      $transaction -> user_id = $user1 -> id;
      $transaction -> old_balance = $balance1;
      $transaction -> change = 0 -$transferAmount;
      $transaction -> new_balance = $account1 -> balance;
      $transaction -> date = $ldate;
      $transaction -> valid = true;
      $transaction ->save();
      ////////////////////////////////////////////////////////
      ///////////////////////////////////////////////////////
      $account2 = Account::find($id2); //incase same account...
      $balance2 = $account2 -> balance;

      $account2 -> balance = $account2 -> balance + $transferAmount;
      $account2->save();

      $transaction = new Transaction();
      $transaction -> account_id = $account2 -> id;
      $transaction -> user_id = $user2 -> id;
      $transaction -> old_balance = $balance2;
      $transaction -> change = $transferAmount;
      $transaction -> new_balance = $account2 -> balance;
      $transaction -> date = $ldate;
      $transaction -> valid = true;
      $transaction ->save();
      echo "yes enough funds";

    }

  }



}
