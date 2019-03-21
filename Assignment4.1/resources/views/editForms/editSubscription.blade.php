@extends('layouts.home')

@section('userSpecificContent')
@if((Auth::user()->role)!='admin')
  <h2>Error</h2>
  <p>Sorry, only admin can view this page</p>
@endif
@if((Auth::user()->role)=='admin')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <p>User: {{$user_name}}</p>
          <p>Book: {{$book_title}}</p>
                    <form method="POST" action="\editSubscription">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">Start Date (yyyy-mm-dd):</label>

                            <div class="col-md-6">
                                <!--<input id="comment" type="text" name="text" value=" $comment->text }}" required autofocus>-->
                                <input name='start' type="date" value="{{$start}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">End Date (yyyy-mm-dd):</label>

                            <div class="col-md-6">
                                <!--<input id="comment" type="text" name="text" value=" $comment->text }}" required autofocus>-->
                                <input name='end' type="date" value={{$end}}/>
                                <input type="hidden" name="id" value = {{$sub_id}} />
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Subscription
                                </button>
                            </div>
                        </div>

                    </form>
        </div>
    </div>
</div>
@endif
@endsection
