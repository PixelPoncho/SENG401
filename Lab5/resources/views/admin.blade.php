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

{{--
  INSTRUCTIONS: The 4 functions below make GET requests to their assigned api routes
  1) Change the API routes to reflect your actual APIs if needed
  2) If you need to change the request type, replace GET with POST, or whatever
--}}


<div class="button-container">
    <div class="form-group form-box">
        <label for="getAllBooks">Get All Books</label>
        <button id="getAllBooks" type="button" class="btn-success btn" onclick="getBooks()">Submit</button>
    </div>
    <div class="form-group form-box">
        <label for="getAllAuthors">Get All Authors</label>
        <button id="getAllAuthors" type="button" class="btn-info btn" onclick="getAuthors()">Submit</button>
    </div>
    <div class="form-group form-box">
        <label for="book_id">Get Book by Book Id</label>
        <input id="book_id" type="text" class="form-control" name="email">
      <button type="button" class="btn-warning btn" onclick="getBooksByID()">Submit</button>
    </div>
    <div class="form-group form-box">
        <label for="book_ISBN">Get Book by ISBN</label>
        <input id="book_ISBN" type="text" class="form-control" name="email">
        <button id="" type="button" class="btn-danger btn" onclick="getAttributesByISBN()">Submit</button>
    </div>
    <div class="form-group form-box">
        <label for="image">Get Image by ID</label>
        <input id="image" type="text" class="form-control" name="email">
        <button id="" type="button" class="btn-danger btn" onclick="getImageByID()">Submit</button>
    </div>

</div>

<div id="ajax-response">
  {{-- AJAX RESPONSE RETURNS HERE --}}
</div>

<script>
    //Get all books
    function getBooks(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax-response").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "/api/books", true);
        xhttp.send();
    }
    // Get all authors
    function getAuthors(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax-response").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "/api/authors", true);
        xhttp.send();
    }
    // Get book image by id
    function getBooksByID(){
        var param = document.getElementById("book_id").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax-response").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", `/api/books/${param}`, true);
        xhttp.send();
    }
    //Get attributes by ISBN
    function getAttributesByISBN(){
        var xhttp = new XMLHttpRequest();
        var param = document.getElementById("book_ISBN").value;
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax-response").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", `/api/booksByISBN/${param}`, true);
        xhttp.send();
    }

    //Get image by id
    function getImageByID(){
        var xhttp = new XMLHttpRequest();
        var param = document.getElementById("image").value;
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ajax-response").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", `/api/image/${param}`, true);
        xhttp.send();
    }
</script>

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
