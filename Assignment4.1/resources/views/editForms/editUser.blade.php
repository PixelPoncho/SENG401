@extends('layouts.home')
<!--EDIT THIS TO EXTEND book_details instead, and book_details to extend home-->
@section('userSpecificContent')
<? $name = "Default name"; ?>
<? $email = "Default email"; ?>
<? $role = "Default Role"; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    <form method="POST" action="\userEdit">
                        @csrf

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">User:</label>

                            <div class="col-md-6">
                                <!--<input id="comment" type="text" name="text" value=" $comment->text }}" required autofocus>-->
                                <!--<textarea id="comment" name="text" value="" required autofocus></textarea>-->
                                <input id="name" type="text" name="text" value=" $name->text }}" required autofocus>
                                <input id="email" type="text" name="text" value=" $email->text }}" required autofocus>
                                <input id="role" type="text" name="text" value=" $role->text }}" required autofocus>
                                <input type="hidden" name="user_id" value = {{$user_id}} />
                                <input type="hidden" name="book_id" value = {{$book_id}} />

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit User
                                </button>
                            </div>
                        </div>

                    </form>
        </div>
    </div>
</div>
@endsection
