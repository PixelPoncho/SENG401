@extends('layouts.home')

@section('userSpecificContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    <form method="POST" action="\addSubscription">
                        @csrf

                        <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">User:</label>

                            <div class="col-md-6">
                                <!--<input id="comment" type="text" name="text" value=" $comment->text }}" required autofocus>-->
                                <select name="user_id">
                                  @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">Book:</label>

                            <div class="col-md-6">
                                <!--<input id="comment" type="text" name="text" value=" $comment->text }}" required autofocus>-->
                                <select name="book_id">
                                  @foreach($books as $book)
                                    <option value="{{$book->id}}">{{$book->title}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">Start Date (yyyy-mm-dd):</label>

                            <div class="col-md-6">
                                <!--<input id="comment" type="text" name="text" value=" $comment->text }}" required autofocus>-->
                                <input name='start' type="date" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">End Date (yyyy-mm-dd):</label>

                            <div class="col-md-6">
                                <!--<input id="comment" type="text" name="text" value=" $comment->text }}" required autofocus>-->
                                <input name='end' type="date" />
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Subscription
                                </button>
                            </div>
                        </div>

                    </form>
        </div>
    </div>
</div>
@endsection
