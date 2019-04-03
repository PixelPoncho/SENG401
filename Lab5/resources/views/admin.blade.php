@extends('layouts.home')

@section('userSpecificContent')
@if((Auth::user()->role)!='admin')
  <h2>Error</h2>
  <p>Sorry, only admin can view this page</p>
@endif
@if((Auth::user()->role)=='admin')
<!--View elements specific to the visitor user goes here-->

<!--Lists of things they can see-->
<!--NOTE: Edit functionality has not yet been implemented-->
<h2>Users</h2>
<ul>
@foreach($users as $user)
  <li>
    <ul>
      <li>Name: {{$user->name}}</li>
      <li>Role: {{$user->role}}</li>
    </ul>
    <a href="\editUser\{{$user->id}}">Edit (THIS BUTTON DOESNT WORK)</a>
  </li>
  <br />
@endforeach
</ul>
<!--<p><b>Note: </b> The ability to edit users does not yet exist</p>-->
<br />
<br />

<h2>Books</h2>
<ul>
@foreach($books as $book)
  <a href="\book_details\{{$book->id}}">
    <li>{{$book->title}}</li>
  </a>
@endforeach
<br />
<br />
<a href="\addBook">Add Book</a>
</ul>


<h2>Authors</h2>
<ul>
@foreach($authors as $author)
    <li>{{$author->name}}</li>
  <a href="\editAuthor\{{$author->id}}">Edit</a>
@endforeach
<br />
<br />
<a href="\addAuthor">Add Author</a>
</ul>

@endif
@endsection
