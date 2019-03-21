@extends('layouts.home')
<!--EDIT THIS TO EXTEND book_details instead, and book_details to extend home-->
@section('userSpecificContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    <form method="POST" action="\editUser">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">User:</label>

                            <div class="col-md-6">

                                Name:<input id="name" type="text" name="user_name" value = {{$user_name}} />
                                Role:<input id="role" type="text" name="user_role" value = {{$user_role}} />
                                <input type="hidden" name="user_id" value = {{$user_id}} />


                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update User
                                </button>
                            </div>
                        </div>

                    </form>
        </div>
    </div>
</div>
@endsection
