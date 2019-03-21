@extends('layouts.home')
<!--EDIT THIS TO EXTEND book_details instead, and book_details to extend home-->
@section('userSpecificContent')
@if((Auth::user()->role)!='admin')
  <h2>Error</h2>
  <p>Sorry, only admin can view this page</p>
@endif
@if((Auth::user()->role)=='admin')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    <form method="POST" action="\commentEdit">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Comment:</label>

                            <div class="col-md-6">
                                <!--//<input id="comment" type="text" name="text" value=" $comment->text }}" required autofocus>-->
                                <textarea id="comment" name="text" required autofocus>{{$comment_text}} </textarea>
                                <input type="hidden" name="comment_id" value = {{$comment_id}} />
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit Comment
                                </button>
                            </div>
                        </div>

                    </form>
        </div>
    </div>
</div>
@endif
@endsection
