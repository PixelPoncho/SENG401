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
                                </div>
                              @endforeach
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
