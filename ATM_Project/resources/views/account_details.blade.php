@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Account Dashboard</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <div class="account-balance">
            <h2>Account Type:</h2>
            <h1>{{ $account->type }}</h1>
            <br>
            <h2>Account Balance:</h2>
            <h1>{{ $account->balance }}</h1>
          </div>



        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Account Actions</div>
        <div class="card-container">
          <div class="col-md-4">
            <div class="form-group">
              <label for="withdraw">Withdraw ammount:</label>
              <input type="text" class="form-control" id="withdraw">
              <button class="btn btn-warning">Submit</button>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="withdraw">Deposit ammount:</label>
              <input type="text" class="form-control" id="deposit">
              <button class="btn btn-warning">Submit</button>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <div class="box-container">
                <div class="box">
                  <label for="withdraw">Transfer ammount:</label>
                  <input type="text" class="form-control" id="transfer">
                </div>
                <div class="box">
                  <label for="withdraw">Recepient</label>
                  <input type="text" class="form-control" id="transfer">
                </div>
              </div>

              <button class="btn btn-warning">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- TRANSACTION HISTORY -->
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Transaction History</div>
        <div class="card-container">
          <table>
            <tr>
              <th>old_balance: </th>
              <th>change: </th>
              <th>new_balance: </th>
              <th>date: </th>
              <th>valid: </th>
            </tr>
            @foreach($transactions as $transaction)
            <tr>
              <th>{{ $transaction->old_balance }}</th>
              <th>{{ $transaction->change }}</th>
              <th>{{ $transaction->new_balance }}</th>
              <th>date: {{ $transaction->date }}</th>
              <th>valid: {{ $transaction->valid }}</th>
            </tr>
            @endforeach

          </table>
          <br />
          <br />
        </div>
      </div>
    </div>
<!--  END TRANSACTION HISTORY-->


  </div>
</div>
@endsection
