@extends('layouts.home')
<!--EDIT THIS TO EXTEND book_details instead, and book_details to extend home-->
@section('userSpecificContent')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    <form method="POST" action="\bookEdit">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">Edit:</label>

                            <div class="col-md-6">

                                <input type="text" name="id" value="{{$res->id}}" disabled>
                                <input type="text" name="title" value="{{$res->title}}">
                                <input type="text" name="isbn" value="{{$res->isbn}}">
                                <input type="text" name="author_id" value="{{$res->author_id}}"> <!--MAKE THIS A DROP DOWN LIST OF AUTHORS IN THE SYSTEM-->
                                <input type="text" name="publicationYear" value="{{$res->publicationYear}}">
                                <input type="text" name="publisher" value="{{$res->publisher}}">
                                <input type="text" name="localLinkToImage" value="{{$res->localLinkToImage}}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit Edit
                                </button>
                            </div>
                        </div>

                    </form>
        </div>
    </div>
</div>
@endsection
