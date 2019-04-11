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
        <div class="table-container">
          <div class="table-responsive">
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Old Balance</th>
                      <th>Change</th>
                      <th>New Balance</th>
                      <th>Date</th>
                      <th>Valid</th>
                    </tr>
                  </thead>
                  <tbody>


                  {{-- @foreach($transactions as $transaction)
                  <tr>
                    <th>{{ $transaction->old_balance }}</th>
                    <th>{{ $transaction->change }}</th>
                    <th>{{ $transaction->new_balance }}</th>
                    <th>date: {{ $transaction->date }}</th>
                    <th>valid: {{ $transaction->valid }}</th>
                  </tr>
                  @endforeach --}}

                  {{-- UNCOMMENT BELOW FOR TESTING PURPOSES --}}

                  <tr>
                    <th>'1490'</th>
                    <th>'10'</th>
                    <th>'1500'</th>
                    <th>'2019/09/12'</th>
                    <th>'true'</th>
                  </tr>
                  <tr>
                      <th>'1490'</th>
                      <th>'10'</th>
                      <th>'1500'</th>
                      <th>'2019/09/12'</th>
                      <th>'true'</th>
                    </tr>
                    <tr>
                        <th>'1490'</th>
                        <th>'10'</th>
                        <th>'1500'</th>
                        <th>'2019/09/12'</th>
                        <th>'true'</th>
                      </tr>
                      <tr>
                          <th>'1490'</th>
                          <th>'10'</th>
                          <th>'1500'</th>
                          <th>'2019/09/12'</th>
                          <th>'true'</th>
                        </tr>

                  </tbody>
                </table>
          </div>
          
          <br />
          <br />
        </div>
      </div>
    </div>
<!--  END TRANSACTION HISTORY-->


  </div>
</div>
@endsection
