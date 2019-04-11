@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">Accounts</div>
                          <div class="card-container">
                            <div class="col-md-4">
                              @foreach($accounts as $account)
                                <div class="form-group">
                                    <p style="">
                                    <b>{{$account->type}}: &nbsp&nbsp</b>${{$account->balance}}</p>
                                    <form method="GET" action="/account_details/{{ $account->id }}">
                                    <button type="submit" class="btn btn-warning" >View Account</button>
                                  </form>
                                </div>
                              @endforeach
                            </div>
                          </div>
                          <div class="card-container">
                            <div class="col-md-4">
                              <br />
                              <br />
                                    <form method="POST" action="/add_account">
                                      <select name="type">
                                        <option value="chequing">Chequing</option>
                                        <option value="savings">Savings</option>
                                        <option value="investment">Investment</option>
                                        <option value="tfsa">TFSA</option>
                                      </select>
                                    <button type="submit" class="btn btn-warning">New Account</button>
                                  </form>
                                    <br />
                                    <br />
                                </div>

                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
