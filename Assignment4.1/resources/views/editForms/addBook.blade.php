@extends('layouts.home')
<!--EDIT THIS TO EXTEND book_details instead, and book_details to extend home-->
@section('userSpecificContent')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    <form method="POST" action="\bookAdd">
                        @csrf

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Title:</label>

                            <div class="col-md-6">
                                <!--<input id="comment" type="text" name="text" value=" $comment->text }}" required autofocus>-->
                                <input name="title" type="text" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Author:</label>

                            <div class="col-md-6">
                                <!--<input id="comment" type="text" name="text" value=" $comment->text }}" required autofocus>-->
                                <!-- FIX ME -->
                                <select name="author">
                                  @foreach($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">ISBN:</label>

                            <div class="col-md-6">
                                <!--<input id="comment" type="text" name="text" value=" $comment->text }}" required autofocus>-->
                                <input name="isbn" type="number" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Publisher:</label>

                            <div class="col-md-6">
                                <!--<input id="comment" type="text" name="text" value=" $comment->text }}" required autofocus>-->
                                <input name="publisher" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Publication Year:</label>

                            <div class="col-md-6">
                                <!--<input id="comment" type="text" name="text" value=" $comment->text }}" required autofocus>-->
                                <input name="year" type="number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Image URL:</label>

                            <div class="col-md-6">
                                <!--<input id="comment" type="text" name="text" value=" $comment->text }}" required autofocus>-->
                                <input name="localLinkToImage" type="text" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit Book
                                </button>
                            </div>
                        </div>

                    </form>
        </div>
    </div>
</div>
@endsection
