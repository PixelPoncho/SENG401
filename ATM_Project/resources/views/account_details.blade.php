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
            <form method="POST" action="\withdraw">
              @csrf
              <div class="form-group">
                <label for="withdraw">Withdraw ammount:</label>
                <input type="number" class="form-control" id="withdraw" name="withdraw" min="1" max="1000000">
                <button type="submit" class="btn btn-warning">Submit</button>
              </div>
            </form>
          </div>

          <div class="col-md-4">
            <form method="POST" action="\deposit">
              @csrf
              <div class="form-group">
                <label for="deposit">Deposit ammount:</label>
                <input type="number" class="form-control" id="deposit" name="deposit" min="1" max="1000000">
                <button class="btn btn-warning">Submit</button>
              </div>
            </form>
          </div>

          <div class="col-md-4">
            <form method="POST" action="\transfer">
              @csrf
              <div class="form-group">
                <div class="box-container">
                  <div class="box">
                    <label for="transferAmount">Transfer ammount:</label>
                    <input type="number" class="form-control" id="transferAmount" name="transferAmount" min="1" max="1000000">
                  </div>
                  <div class="box">
                    <label for="transferRecipient">Recepient</label>
                    <input type="text" class="form-control" id="transferRecipient" name="transferRecipient" required>
                  </div>
                </div>
                <button class="btn btn-warning">Submit</button>
              </div>
            </form>
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
