@extends ('layouts.app')
@section('content')
<h1><u>Book Details</u></h1>

<!-- <p> Until then, enjoy this image </p> -->

<!-- <img src = "https://cdn.pixabay.com/photo/2014/06/21/08/43/rabbit-373691__340.jpg" /> -->
<br>


<!-- BOOK DETAILS -->
<h1>{{ $res->title }}</h1>
<table border = 1>
  <tr>
    <!--<th>id: </th> -->
    <th>Title: </th>
    <th>ISBN: </th>
    <th>Authors: </th>
    <th>Publication Year: </th>
    <th>Publisher: </th>
    <!--<th>Link to Cover Image:</th>-->
    <th>Cover Image:</th>
  </tr>
  <tr>
    <!--<td>{{ $res->id }}</td> -->
    <td>{{ $res->title }}</td>
    <td>{{ $res->isbn }}</td>
    <td>{{ $res->author_id }}</td> <!--FIND A WAY TO MAKE THIS A LIST OF THE AUTHOR'S NAMES-->
    <td>{{ $res->publicationYear }}</td>
    <td>{{ $res->publisher }}</td>
    <!--<td> {{ $res->localLinkToImage }}</td>-->
    <td> <img src = "{{$res->localLinkToImage}}"/> </td>
  </tr>
</table>
<br />
<br />

<!-- COMMENTS -->
<h1> Comments </h1>
<ul>
@foreach($comments as $comment)

<li>{{ $comment->text }} <a href = '\commentEdit'> Edit </a></li>

@endforeach
</ul>


<!--EDIT BOOK FORM-->
<p> UPDATE INFO </p>
<form method="POST" action="/book_details/{{ $res->id }}">
  @csrf
  {{ method_field('PATCH') }}
  <input type="text" name="id" value="{{$res->id}}" disabled>
  <input type="text" name="title" value="{{$res->title}}">
  <input type="text" name="isbn" value="{{$res->isbn}}">
  <input type="text" name="author_id" value="{{$res->author_id}}"> <!--MAKE THIS A DROP DOWN LIST OF AUTHORS IN THE SYSTEM-->
  <input type="text" name="publicationYear" value="{{$res->publicationYear}}">
  <input type="text" name="publisher" value="{{$res->publisher}}">
  <input type="text" name="localLinkToImage" value="{{$res->localLinkToImage}}">
  <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
      <button type="submit" class="btn btn-primary">
        Update
      </button>
    </div>
  </div>
</form>
@endsection
